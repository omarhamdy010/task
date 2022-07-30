<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class TransactionController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Transaction::where('from', auth()->id())->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('from', function ($user) {
                    $from = $user->from;
                    $name = User::find($from);

                    return $name->name;
                })
                ->editColumn('user_id', function ($user) {
                    $name = User::find($user->user_id);
                    return $name->name;
                })
                ->editColumn('created_at', function ($user) {

                    return Carbon::now()->format('Y-m-d H:i:s A');
                })
                ->rawColumns(['user_id', 'form', 'created_at'])
                ->make(true);
        }

        return view('admin_user.all_trancation');
    }

    public function create()
    {
        $users = User::where('id', '!=', auth()->user()->id)->get();
        return view('user.create', compact('users'));
    }

    public function store(Request $request)
    {
        $time_before_houre = Carbon::now()->subHour();

        $transactions = Transaction::where('from', auth()->user()->id);
        $transactions_time = $transactions->where('created_at', '>=', $time_before_houre)->get();

        $total = 0;
        foreach ($transactions_time as $item) {
            $total += $item->amount;
        }

        if ($total + $request->amount <= 200) {
            Transaction::create([
                'amount' => $request->amount,
                'user_id' => $request->user,
                'from' => auth()->user()->id
            ]);

            $user= User::where('id', auth()->user()->id)->first();

            $data['balance'] = ($user->balance) - ($request->amount);

            $user->update($data);

        }
        return redirect()->back();
    }

    public function edit()
    {
        $user = User::where('id', auth()->user()->id)->first();
        return view('user.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'old_password' => 'required',
            'new_password' => 'required:confirmed',
        ]);
        $user = User::where('id', $request->id)->first();
        if (Hash::check($request->old_password, $user->password)) {
            $user->update([
                'password' => Hash::make($request->new_password),
            ]);
        }
        return redirect()->back();
    }

    public function getAll(Request $request)
    {
        if ($request->ajax()) {
            $data = Transaction::all();
            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('from', function ($user) {
                    $from = $user->from;
                    $name = User::find($from);

                    return $name->name;
                })
                ->editColumn('user_id', function ($user) {
                    $name = User::find($user->user_id);
                    return $name->name;
                })
                ->editColumn('created_at', function ($user) {

                    return Carbon::now()->format('Y-m-d H:i:s A');
                })
                ->rawColumns(['user_id', 'form', 'created_at'])
                ->make(true);
        }
        return view('admin_user.all_trancations');
    }
}
