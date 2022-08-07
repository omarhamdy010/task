@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Transaction') }}</div>

                    <div class="card-body">
                        <table class="table table-bordered data-table01" >
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>amount</th>
                                <th>from</th>
                                <th>To</th>
                                <th>created_at</th>
                            </tr>
                            </thead>
                            <tbody>

{{--@foreach($transactions as $transaction )--}}
{{--                            <tr>--}}
{{--                                <?php--}}
{{--                                 $user= \App\Models\User::where('id',$transaction->user_id)->first();--}}
{{--                                $from =\App\Models\User::where('id',$transaction->from)->first()--}}
{{--                                ?>--}}
{{--                                <td>{{$transaction->id}}</td>--}}
{{--                                <td>{{$transaction->amount}}</td>--}}
{{--                                <td>{{$from->name}}</td>--}}
{{--                                <td>{{$user->name}}</td>--}}
{{--                                <td>{{$transaction->created_at}}</td>--}}
{{--                            </tr>--}}
{{--    @endforeach--}}

                            </tbody>
                        </table>

{{--                        {!! $transactions->links() !!}--}}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
