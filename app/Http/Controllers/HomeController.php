<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::paginate(9);
        $categories = Category::all();
        return view('index', ['products' => $products, 'categories' => $categories]);
    }

    /**
     * Show products in category
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function productsInCategory($id)
    {
        $products = Category::find($id)->products()->paginate(9);
        $categories = Category::all();
        return view('index', ['products' => $products, 'categories' => $categories]);
    }
}
