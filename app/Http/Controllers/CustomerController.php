<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Mail\OrderNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CustomerController extends Controller
{
    //
    public function index()
    {
        return User::all();
    }

    //jsut getting the current user
    public function user()
    {
        $user = Auth::user();
        return $user;
    }

    public function show($id)
    {
        return User::where('id',$id)->first();
    }

    public function checkout(Request $request)
    {
        $productIds = $request->input('productIds');
        $email = $request->input('userEmail');

        $products = Product::whereIn('id', $productIds)->get();
        $totalAmount = $products->sum('price');

        Mail::to('tagoonjulynard@gmail.com')->queue(new OrderNotification($products, $totalAmount, $email));

        return response()->json(['message' => 'Order processed successfully'], 200);
    }

    public function update(Request $request)
    {
        $request->validate([
            'fname' => 'required',
            'lname' => 'required'
        ]);
    
        User::where('id', $request->id)->update($request->all());
    
        $response = ['message' => 'User updated successfully!'];
        return response()->json($response);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(['message' => 'User deleted successfully']);
    }
}