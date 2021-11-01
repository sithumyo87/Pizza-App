@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header" style="background: #fa2c2c;color: white">Order</div>

                    <div class="card-body">
                        @if (session('message'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif
                            @if (session('successmessage'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('successmessage') }}
                                </div>
                            @endif
                        @if(Auth::check())
                                <a href="/" class=" ">Go To the Home Page</a>
                        <form action="{{route('order.store',$pizza->id)}}" method="POST">@csrf
                            <div class="list-group mt-4">
                                <label for="name">Name</label>
                            <input type="text" value="{{auth()->user()->name}}" class="list-group-item " name="name">
                            </div>
                        <div class="list-group mt-2">
                            <label for="email">Email</label>
                            <input type="text" value="{{auth()->user()->email}}" class="list-group-item " name="email">
                        </div>
                        <div class="list-group mt-2">
                            <label for="small_pizza">Small Pizza Order</label>
                            <input type="number" value="0" class="list-group-item " name="small_pizza">
                        </div>
                        <div class="list-group mt-2">
                            <label for="medium_pizza">Medium Pizza Order</label>
                            <input type="text" value="0" class="list-group-item " name="medium_pizza">
                        </div>
                        <div class="list-group mt-2">
                            <label for="large_pizza">Large Pizza Order</label>
                            <input type="text" value="0" class="list-group-item " name="large_pizza">
                        </div>
                        <input type="hidden" name="pizza_id" value="{{$pizza->id}}">
                        <div class="list-group mt-2">
                            <input type="time" name="time" class="list-group-item">
                            <input type="date" name="date" class="list-group-item">
                        </div>
                        <div class="list-group mt-2">
                            <label for="description">Description</label>
                            <textarea name="description" id="" cols="30" rows="3" class="list-group-item"></textarea>
                        </div>
                        <button type="submit" class="btn btn-danger mt-2">Order Now</button>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-8 ">
                <div class="card">
                    <div class="card-header" style="background: #fa2c2c;color: white">Pizza Menu</div>
                    <div class="card-body">
                                    <img src="{{Storage::url($pizza->image)}}" alt=""  width="100%">
                                    <h1 class="mt-4">{{$pizza->name}}</h1>
                                    <p>{{$pizza->description}}</p>
                                    <p>Small Pizza Price : ${{$pizza->small_pizza_price}}</p>
                                    <p>Medium Pizza Price : ${{$pizza->medium_pizza_price}}</p>
                                    <p>Large Pizza Price : ${{$pizza->large_pizza_price}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

