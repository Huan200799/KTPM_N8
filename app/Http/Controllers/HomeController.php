<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Categories;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Favorite;
use Illuminate\Support\Facades\Config;
use App\Repositories\Interfaces\CategoriesRepositoryInterface;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use DB;
use Session;
class HomeController extends Controller
{
    private $categoriesRepository;
    private $productRepository;
    public function __construct(
        CategoriesRepositoryInterface $categoriesRepository,
        ProductRepositoryInterface $productRepository
    )
    {
        $this->categoriesRepository = $categoriesRepository;
        $this->productRepository = $productRepository;
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $productdrink = $this->productRepository->getProductsHome();
        $categories = $this->categoriesRepository->getCategoriesHome();
        $categorieChilds = $this->categoriesRepository->getCategoriesChildHome();
        $productfood = DB::table('product')->join('categories', 'product.categories_id', '=', 'categories.id')
        ->select('product.*')
        ->where('product.categories_id', 2)->orwhere('categories.parent_id', 2)->orderby('product.id', 'desc')->take(8)->get();
        $favorites = DB::table('product')
        ->join('favorite', 'favorite.product_id', '=', 'product.id')
        ->select('product.*', 'favorite.product_id', 'favorite.user_id', 'favorite.id')->distinct()->get();
        return view('homepage', compact(['categories', 'categorieChilds', 'productdrink', 'productfood', 'favorites']));
    }

    public function get_product_detail($id)
    {
        try {
            $products = $this->productRepository->product_detail($id);
            $favorites = Favorite::all();
            return view('pages.components.detailproduct', compact(['products', 'favorites']));
        } catch (Exception $e) {

            return back()->withErrors( __('message.edit'));
        }
    }

    public function get_categories_detail($id){
        $productcategories = DB::table('product')
        ->join('categories','product.categories_id','=','categories.id')
        ->select('product.*')
        ->where('categories_id',$id)->orwhere('categories.parent_id', $id)->get();
        return view('pages.components.productcategories', compact(['productcategories']));
    }

    public function get_productsparent_id($id){
        $productsparent_id = DB::table('product')
        ->join('categories','product.categories_id','=','categories.id')
        ->select('product.*')
        ->where('parent_id',$id)->get();
        return view('pages.components.productparent', compact(['productsparent_id']));
    }

    public function get_history_product($id){
        $history_product = DB::table('order')
        ->join('order_detail','order.id','=','order_detail.order_id')
        ->join('product','product.id','=','order_detail.product_id')
        ->where('order.user_id',$id)->orderby('order.id', 'desc')->get();
        return view('pages.components.historyproduct', compact(['history_product']));
    }


    public function search(Request $request)
    {
        if($request->search == null){
            return redirect('homepage');
        }
        else{
        $search = $request->search;
        $search = str_replace(' ', '%', $search);
        $data['key'] = $search;
        $data['searchs'] = Product::where('product_name', 'like', '%'.$search.'%')->orWhere('price', '<=', $search)->get();

        return view('pages.components.search',$data);
        }
    }

    public function changeLanguage(Request $request){
        $lang = $request->language;
        $language = config('app.locale');
        if ($lang == 'en') {
            $language = 'en';
        }
        if ($lang == 'vn') {
            $language = 'vn';
        }
        Session::put('language', $language);
        return redirect()->back();
    }

}
