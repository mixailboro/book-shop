<?php

namespace App\Http\Controllers;

use App\Http\Requests\Cart\StoreRequest;
use App\Models\Book;
use App\Models\Cart;
use http\Exception\RuntimeException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        if($cart = Auth::user()->cart()->first()){
            $this->update($request, $cart);
        }else{
            $cart = new Cart();
            $data['user_id'] = Auth::id();
            $cart->user_id = $data['user_id'];
            $cart->save();
            $book = Book::query()->findOrFail($data['book_id']);
            $cart->books()->attach($book, ['quantity' => $data['quantity']]);
            $cart->total_cost = $this->calculateTotalCost($cart);
            $cart->save();
        }

        return $cart;
    }


    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreRequest $request, Cart $cart)
    {
        $data = $request->validated();
        $book = Book::query()->findOrFail($data['book_id']);

        if (!$bookCart = $cart->books()->find($book->id)) {
            $cart->books()->attach($book, ['quantity' => $data['quantity']]);
        }else{
            $bookCart->pivot->quantity ++;
            $bookCart->pivot->save();
        }
        $cart->total_cost = $this->calculateTotalCost($cart);

        return $cart;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        //
    }
//    private function calculateTotalCost(int $book_id, int $quantity)
//    {
//        $book = Book::findOrFail($book_id);
//
//        if(!$book){
//            return new RuntimeException('Book not found');
//        }
//
//        return $book->price * $quantity;
//    }

    private function calculateTotalCost(Cart $cart): string
    {
        $totalCost = $cart->total_cost ?? 0;

        foreach ($cart->books() as $book) {
            $totalCost = $book->price * $book->pivot->quantity;
        }
        return (string)$totalCost;
    }
}
