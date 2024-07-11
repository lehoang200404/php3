<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class proController extends Controller
{
    public function listProducts(Request $request){
        if(isset($request->search)){
            $listProducts = DB::table('products')
            ->join('category', 'products.category_id', '=', 'category.id')
            ->select('products.id', 'products.name as pro_name', 'products.category_id', 'products.price', 'products.view', 'category.name as cate_name')
            ->orderBy('view', 'desc')
            ->where('pro_name', 'like', '%'.$request->search.'%')
            ->get();
            return view('products/listProducts')->with([
                'listProducts' => $listProducts
            ]);
        }else{
            $listProducts = DB::table('products')
            ->join('category', 'products.category_id', '=', 'category.id')
            ->select('products.id', 'products.name as pro_name', 'products.category_id', 'products.price', 'products.view', 'category.name as cate_name')
            ->orderBy('view', 'desc')
            ->get();
            return view('products/listProducts')->with([
                'listProducts' => $listProducts
            ]);
        }

    }

    public function addProducts(){
        $category = DB::table('category')
        ->select( 'id', 'name')
        ->get();
        return view('products/addProducts')->with([
            'category' => $category
        ]);
    }

    public function addPostProducts(Request $request){
        $data = [
            'name' => $request->name,
            'category_id' => $request->category,
            'price' => $request->price,
            'view' => $request->view,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];
        DB::table('products')->insert($data);
        return redirect()->route('products.listProducts');
    }

    public function updateProducts($productsId){
        $category = DB::table('category')
        ->select('id', 'name')
        ->get();
        $product = DB::table('products')->where('id', $productsId)->first();
        return view('products/updateProducts')->with([
            'category' => $category,
            'product' => $product
        ]);
    }
    
    public function updatePostProducts(Request $request){
        $data = [
            'name' => $request->name,
            'category_id' => $request->category,
            'price' => $request->price,
            'view' => $request->view,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];
        DB::table('products')->where('id', $request->productsId)->update($data);
        return redirect()->route('products.listProducts');
    }
    public function deleteProducts($productsId){
        DB::table('products')->where('id', $productsId)->delete();
        return redirect()->route('products.listProducts');
    }


        public function searchProducts(Request $request)
    {
        $searchTerm = $request->input('searchProducts');
        
        $product = DB::table('products')
        ->where('name', 'like', "%$searchTerm%")
        ->get();

        $listProducts = DB::table('products')
        ->join('category', 'products.category_id', '=', 'category.id')
        ->select('products.id', 'products.name as pro_name', 'products.category_id', 'products.price', 'products.view', 'category.name as cate_name')
        ->orderBy('view', 'desc')
        ->get();

        return view('products/listProducts')->with([
            'product' => $product,
            'searchTerm' => $searchTerm,
            'listProducts' => $listProducts
        ]);
    }
}
