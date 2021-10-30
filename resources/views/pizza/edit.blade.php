@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Menu</div>

                    <div class="card-body">
                        <ul class="list-group ">
                            <a href="{{route('pizza.index')}}"><li class="list-group-item list-group-item-action">View</li></a>
                            <a href="{{route('pizza.create')}}"><li class="list-group-item list-group-item-action">Create</li></a>
                        </ul>
                    </div>
                </div>
                @if(count($errors) > 0)
                    <div class="card mt-3">
                        <div class="card-body">
                            @foreach($errors->all() as $error)
                                <div>
                                    <p class="alert alert-danger">{{$error}}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Pizza</div>
                    <div class="card-body">

                        <form action="{{route('pizza.update',$pizza->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @METHOD('PUT')
                            <div class="form-group">
                                <label for="name">Pizza Name</label>
                                <input type="text" name="name" class="form-control" placeholder="insert pizza name" value="{{$pizza->name}}">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="" cols="30" rows="5" class="form-control" >{{$pizza->description}}</textarea>
                            </div>
                            <div class="form-inline">
                                <label for="description" class="mr-2">Price $ </label>
                                <input type="number" name="small_pizza_price" class="form-control" placeholder="Small Size Pizza" value="{{$pizza->small_pizza_price}}">
                                <input type="number" name="medium_pizza_price" class="form-control" placeholder="Medium Size Pizza" value="{{$pizza->medium_pizza_price}}">
                                <input type="number" name="large_pizza_price" class="form-control" placeholder="Large Size Pizza" value="{{$pizza->large_pizza_price}}">
                            </div>
                            <div class="form-group mt-3">
                                <label for="categroy">Category</label>
                                <select id="" class="form-control" name="category" value="{{$pizza->category}}">
                                    <option value="traditional">traditional</option>
                                    <option value="non-traditional">non-traditional</option>
                                    <option value="vegetarian">vegetarian</option>
                                    <option value="non-vegetarian">non-vegetarian</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" name="image" class="form-control mb-2">
                                <img src="{{Storage::url($pizza->image)}}" style="width: 80px" alt="">
                            </div>
                            <button type="submit" class="btn btn-primary ">Update Pizza</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
