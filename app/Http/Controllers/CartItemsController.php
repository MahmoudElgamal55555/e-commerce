<?php

namespace App\Http\Controllers;

use App\Models\CartItems;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CartItemsController extends Controller
{

    function add(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'product_id' => 'required',
        ]);

        $carts_items = DB::table('cart_items')->insert([
            'user_id' => $request->user_id,
            'product_id' => $request->product_id,
        ]);
        return response()->json([
            'response' => $carts_items,
        ], 200);
    }

    function delete($id)
    {
        $delete = DB::table('cart_items')->where('id', $id)->delete();
        return response()->json([
            'response' => "deleted",
        ], 200);
    }

    function getUserCart($id)
    {
        return DB::table('cart_items')->where('user_id', $id)->get();
    }

    function showAll()
    {
        $show = DB::table('cart_items')->get();
        return response()->json([
            'response' => $show,
        ], 200);
    }
}
