<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Models\Product\Cart;
use Illuminate\Http\Request;

use App\Models\Product\Product;

use Auth;
use Illuminate\Support\Facades\Redirect;
class ProductsController extends Controller
{
    //
    public function singleProduct($id){
        $product = Product::find($id);

        $relatedProducts = Product::where('category', $product->category)
            ->where('id', '!=', $product->id)->take(4)
            ->orderBy('id', 'desc')
            ->get();

        $checkCart = Cart::where('product_id', $id)
            ->where('user_id', Auth::user()->id)
            ->count();

        return view('products.single-product', compact('product', 'relatedProducts', 'checkCart'));
    }

    public function addToCart(Request $request, $id)
    {
        $addCart = Cart::create([
           "product_id" => $request["product_id"],
           "name" => $request["name"],
           "price" => $request["price"],
           "image" => $request["image"],
            "user_id" => Auth::user()->id,
        ]);

//        echo "item added to cart";

        return Redirect::route('product.single', $id)->with('success', 'Product added to cart successfully!');
    }

    public function viewCart(){
        $cart = Cart::where('user_id', Auth::user()->id)
            ->where('product_id', '!=', null)
            ->orderBy('id', 'desc')
            ->get();

        $totalCost = Cart::where('user_id', Auth::user()->id)
            ->where('product_id', '!=', null)
            ->sum('price');

        return view('products.cart', compact('cart', 'totalCost'));
    }

    public function deleteProductCart($id){
        $deleteProductFromCart = Cart::where('product_id', $id)
            ->where('user_id', Auth::user()->id)
            ->delete();

        if($deleteProductFromCart){
            return Redirect::route('cart')->with('delete', 'Product deleted from cart successfully!');
        }
    }
}
