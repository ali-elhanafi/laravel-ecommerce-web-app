<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Stripe\Charge;
use Stripe\Stripe;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::all();
        $categories = Category::all();
        return view('admin.products.index', ['products' => $products, 'categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::pluck('name', 'id')->all();
        return view('admin.products.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {

        $inputs = request()->validate([
            'category_id' => 'required',
            'title' => 'required|min:3|max:200',
            'photo' => 'file',
            'price' => 'required'
        ]);
        if (request('photo')) {
            $inputs['photo'] = request('photo')->store('images');
        }
        auth()->user()->products()->create($inputs);
        session()->flash('product-created', 'product ' . $inputs['title'] . ' has created');

        return redirect()->route('product.index');
//        return dd(\request());
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($id)
    {

        $products = Product::where('category_id', $id)->get();
        $categories = Category::all();
        return view('home.product', ['products' => $products, 'categories' => $categories]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function addToCart(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);
        $request->session()->put('cart', $cart);
//        dd($request->session()->get('cart'));
        return redirect()->route('home');
    }

    public function getCart()
    {
        if (!Session::has('cart')) {
            return view('home.shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('home.shopping-cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    public function checkOut()
    {
        if (!Session::has('cart')) {
            return view('home.shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;
        return view('home.checkout',['total' => $total]);
    }
    public function check(Request $request){
        if (!Session::has('cart')) {
            return redirect()->route('home.shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        Stripe::setApiKey(env('STRIPE_SECRET'));
        try {
            Charge::create([
                'amount' => $cart->totalPrice * 100,
                'currency' => 'usd',
                "source" => $request->stripeToken,
                'description' => 'My First Test Charge (created for API docs)',
            ]);
        }catch (\Exception $e){
            return redirect()->route('cart.checkout')->with('error', $e->getMessage());
        }
        Session::forget('cart');
        return redirect()->route('home')->with('success','successfully charged');
    }

    ///test stripe
//    public function stripePost(Request $request)
//    {
//        Stripe::setApiKey(env('STRIPE_SECRET'));
//        Charge::create ([
//            "amount" => 100 * 100,
//            "currency" => "usd",
//            "source" => $request->stripeToken,
//            "description" => "This payment is tested purpose phpcodingstuff.com"
//        ]);
//
//        Session::flash('success', 'Payment successful!');
//
//        return back();
//    }
}
