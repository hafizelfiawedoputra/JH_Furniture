<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function viewtransaction(){
        if (!Auth::user()->kategori == '1')
            $transactions = Transaction::with('order_items.furnitures', 'users')->has('order_items.furnitures')->where('user_id', Auth::id())->get();
        else $transactions = Transaction::with('order_items.furnitures', 'users')->has('order_items.furnitures')->get();
        return view('frontend.transaction', compact('transactions'));
    }
}
