@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Orders
                        <a href="/"><button class="btn btn-sm ml-2 btn-primary float-right">View Pizza</button></a>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <table class="table table-striped table-bordered">
                            <tr>
                                <td>User</td>
                                <td>Phone/Email</td>
                                <td>Date/Time</td>
                                <td>Pizza Id</td>
                                <td>S.Pizza</td>
                                <td>M.Pizza</td>
                                <td>L.Pizza</td>
                                <td>Total</td>
                                <td>Message</td>
                                <td>Status</td>
                            </tr>
                            @foreach($orders as $order)
                                <tr>


                                    <td>{{$order->user->name}}</td>
                                    <td>{{$order->user->email}}</td>
                                    <td>{{$order->date}}/{{$order->time}}</td>
                                    <td>{{$order->pizza->name}}</td>
                                    <td>{{$order->small_pizza}}</td>
                                    <td>{{$order->medium_pizza}}</td>
                                    <td>{{$order->large_pizza}}</td>
                                    <td>$ {{$order->pizza->small_pizza_price * $order->small_pizza + $order->pizza->medium_pizza_price * $order->medium_pizza +
$order->pizza->large_pizza_price * $order->large_pizza}}</td>
                                    <td>{{$order->body}}</td>
                                    <td>{{$order->status}}</td>
                                </tr>
                            @endforeach

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
