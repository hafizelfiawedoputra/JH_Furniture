<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\OrderItem;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function viewcheckout(){
        $cartitems = Cart::where('user_id', Auth::id())->get();
        return view('frontend.checkout', compact('cartitems'));
    }

    public function placeorder(Request $request){

        $request->validate([
            'id_card' => ['required', 'numeric', 'min:16'],
        ]);

        $transaction = new Transaction();
        $transaction->user_id = Auth::id();
        $transaction->method = $request->input('method');
        $transaction->id_card = $request->input('id_card');
        $transaction->save();

        $cartitems = Cart::where('user_id', Auth::id())->get();
        foreach ($cartitems as $item){
            OrderItem::create([
                'transaction_id'=>$transaction->id,
                'prod_id'=>$item->prod_id,
                'prod_qty'=>$item->prod_qty,
                'price'=>$item->furnitures->price,
            ]);
        }

        $cartitems = Cart::where('user_id', Auth::id())->get();
        Cart::destroy($cartitems);

        return redirect('/');
    }
}
