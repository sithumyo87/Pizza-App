@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header" style="background: #fa2c2c;color: white">Menu</div>

                    <div class="card-body">
                        <ul class="list-group ">
                            <form action="{{route('frontend')}}" method="GET">@csrf
                                <a href="/"><li class="list-group-item list-group-item-action">Back</li></a>
                            <input type="submit" value="Vegetarian" name="category" class="list-group-item list-group-item-action">
                            <input type="submit" value="Non-traditional" name="category" class="list-group-item list-group-item-action">
                            <input type="submit" value="Traditional" name="category" class="list-group-item list-group-item-action">
                            </form>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header" style="background: #fa2c2c;color: white">Pizza Menu</div>
                    <div class="card-body">
                        <div class="row text-center">
                            @foreach($pizzas as $pizza)
                                <div class="col-md-4 border p-2">
                                    <img src="{{Storage::url($pizza->image)}}" alt="" class="img-thumbnail" width="100%">
                                    <p>{{$pizza->name}}</p>
                                    <p>{{$pizza->description}}</p>
                                    <a href="{{route('pizza.order',$pizza->id)}}"><button class="btn btn-sm btn-danger text-center">Order Now</button></a>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

