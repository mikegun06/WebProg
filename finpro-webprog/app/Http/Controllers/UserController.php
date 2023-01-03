<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\TransactionDetail;
use App\Models\TransactionHeader;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

class UserController extends Controller
{
    public function cart()
    {
        $categories = Category::all();
        $cart = session()->get('cart', []);
        return view('user.cart', ['categories' => $categories, 'cart' => $cart]);
    }

    public function addToCart(Request $request)
    {
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');

        $product = Product::find($productId);

        $cart = session()->get('cart', []);

        foreach ($cart as $c) {
            if ($product->id == $c['id']) {
                session()->flash('message', 'Item Already Added in Cart');
                return redirect('cart');
            }
        }

        $cart[] = [
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => $quantity,
            'photo' => $product->photo,
        ];
        session()->put('cart', $cart);

        session()->flash('message', 'Item Added to Cart');

        return redirect('cart');
    }

    public function removeFromCart($id)
    {
        $cart = session()->get('cart', []);

        foreach ($cart as $i => $c) {
            if ($c['id'] == $id) {
                unset($cart[$i]);
                break;
            }
        }

        session()->put('cart', $cart);

        return redirect('cart');
    }

    public function purchase()
    {
        $cart = session('cart');
        $total_products = 0;
        $total_price = 0;

        foreach ($cart as $c) {
            $total_products += $c['quantity'];
            $total_price += $c['quantity'] * $c['price'];
        }

        $transactionHeader = TransactionHeader::create([
            'user_id' => auth()->user()->id,
            'date' => Carbon::now(),
            'total_products' => $total_products,
            'total_price' => $total_price,
        ]);

        $headerId = $transactionHeader->id;

        foreach ($cart as $c) {
            TransactionDetail::create([
                'transaction_id' => $headerId,
                'product_id' => $c['id'],
                'quantity' => $c['quantity'],
                'sub_price' => $c['quantity'] * $c['price'],
            ]);
        }

        session()->forget('cart');
        session()->flash('message', 'Transaction Success');

        return redirect('/dashboard');
    }

    public function history()
    {
        $categories = Category::all();
        $transactionHeader = TransactionHeader::all();

        $transactionHeader = TransactionHeader::where('user_id', '=', auth()->user()->id)->get();
        $transactionDetail = TransactionDetail::whereIn('transaction_id', $transactionHeader->pluck('id'))->get();

        $products = Product::all();

        return view('user.history', ['categories' => $categories, 'trdetail' => $transactionDetail, 'trheader' => $transactionHeader, 'transactionHeader' => $transactionHeader, 'products' => $products]);
    }
}