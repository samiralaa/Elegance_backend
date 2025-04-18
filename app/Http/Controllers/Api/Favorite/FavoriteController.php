<?php

namespace App\Http\Controllers\Api\Favorite;
use App\Models\Favorite;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function index()
{
    return auth()->user()->favorites()->with('product.images')->get();
}

public function store(Request $request)
{
    $request->validate(['product_id' => 'required|exists:products,id']);

    $favorite = Favorite::firstOrCreate([
        'user_id' => auth()->id(),
        'product_id' => $request->product_id
    ]);

    return response()->json(['message' => 'Added to favorites']);
}

public function destroy($product_id)
{
    Favorite::where('user_id', auth()->id())
        ->where('product_id', $product_id)
        ->delete();

    return response()->json(['message' => 'Removed from favorites']);
}
}
