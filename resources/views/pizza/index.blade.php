@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}
                        <a href="{{route('pizza.create')}}"><button class="btn btn-primary float-right">Add Pizza</button></a>
                    </div>

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
                                    <td><a href="{{route('pizza.edit',$pizza->id)}}">
                                        <button class="btn btn-primary">Edit</button>
                                    </a>
                                    <a href="{{route('pizza.delete',$pizza->id)}}"> </a>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{$pizza->id}}">
                                            Delete
                                        </button>
                                    </td>
                                    <!-- Modal -->
                                    <form action="{{route('pizza.delete',$pizza->id)}}" method="post" >
                                        @csrf
                                        @method('DELETE')
                                        <div class="modal fade" id="exampleModal{{$pizza->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure to delete?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Delete</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
