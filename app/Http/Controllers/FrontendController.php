<?php

namespace App\Http\Controllers;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use App\Models\Pizza;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(Request $request){
        if(!$request->category){
            $pizzas = Pizza::latest()->get();
            return view('frontend',compact('pizzas'));
        }else{
            $pizzas = Pizza::where('category',$request->category)->get();
            return view('frontend',compact('pizzas'));
        }



    }
    public function pizzaOrder($id){
        $pizza = Pizza::find($id);
        return view('pizzaOrder',compact('pizza'));
    }
    public function storeOrder(Request $request){
        if($request->small_pizza == 0 && $request->medium_pizza == 0 && $request->large_pizza == 0 ){
            return back()->with('message','At least One Pizza Order');
        }
        if($request->small_pizza == -1 || $request->medium_pizza == -1 || $request->large_pizza == -1 ){
            return back()->with('message','Do not negative value For Order');
        }
         Order::create([
            'user_id' => auth()->user()->id,
            'email' => $request->email,
            'date' => $request->date,
            'time'=>$request->time,
            'pizza_id'=>$request->pizza_id,
            'small_pizza'=>$request->small_pizza,
            'medium_pizza'=>$request->medium_pizza,
            'large_pizza'=>$request->large_pizza,
            'body'=>$request->description,
        ]);
        return back()->with('successmessage','You order have completed successfully');
    }
}
