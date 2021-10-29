@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <table class="table table-striped table-bordered">
                            <tr>
                                <td>Id</td>
                                <td>Name</td>
                                <td>Image</td>
                                <td>Description</td>
                                <td>S.Price</td>
                                <td>M.Price</td>
                                <td>L.Price</td>
                                <td>Category</td>
                                <td></td>
                            </tr>
                            @foreach($pizzas as $key=>$pizza)
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td>{{$pizza->name}}</td>
                                    <td>
                                        <img src="{{Storage::url($pizza->image)}}" width="80" alt="">
                                    </td>
                                    <td>{{$pizza->description}}</td>
                                    <td>{{$pizza->small_pizza_price}}</td>
                                    <td>{{$pizza->medium_pizza_price}}</td>
                                    <td>{{$pizza->large_pizza_price}}</td>
                                    <td>{{$pizza->category}}</td>
                                    <td><a href="">
                                        <button class="btn btn-primary">Edit</button>
                                    </a>
                                    <a href="">
                                            <button class="btn btn-danger">Delete</button>
                                        </a></td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
