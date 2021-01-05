<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Product;
use App\User;
use App\Category;
use Illuminate\Pagination;
use Validator;

class ProductController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $product = Product::paginate(3);
        $categoryList = Category::pluck('name','id')->toArray();
        $userList = User::pluck('name','id')->toArray();
        return view('product.products', compact('product','categoryList','userList'));
    }
    public function create()
    {
        $categoryList = Category::pluck('name','id')->toArray();
        $statusList = ['1' => __('eng.ACTIVE'), '2' => __('eng.INACTIVE')];
        return view('product.create')->with(compact('statusList','categoryList'));
    }

    public function store(Request $request) {
        $rules = [
            'name' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect('products/create')
                            ->withErrors($validator)
                            ->withInput();
        }
        $product = new Product();
        $product->name = $request->name;
        $product->status = !empty($request->status) ? $request->status : '0';
        $product->category =  $request->category;
        $product->created_by = Auth::user()->id;
        $product->updated_by = Auth::user()->id;
        if ($product->save()) {
            return redirect('products')->with('success',  __('eng.CREATE_SUCCESS'));
        } else {
            return redirect('products/create')->with('success', __('eng.CREATE_ERROR'));
        }
    }

   
    public function show($id)
    {
        
    }

   
    public function edit($id) {
        $categoryList = Category::pluck('name','id')->toArray();
        $products = Product::where('id', '=', $id)->first();
        return view('product.update', compact('products','categoryList'));
    }

    
    public function update(Request $request, $id) {
        $rules = [
            'name' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect('products/edit/' . $request->id)
                            ->withErrors($validator)
                            ->withInput();
        }

        $products = Product::find($id);
        $products->name = $request->name;
        $products->status = !empty($request->status) ? $request->status : '0';
        $products->updated_by = Auth::user()->id;
        if ($products->save()) {
            return redirect('products')->with('success', __('eng.UPDATE_SUCCESS'));
        } else {
            return redirect('update')->with('success', __('eng.UPDATE_ERROR'));
        }
    }

    
    public function destroy($id) {
        if (DB::table('products')->where('id', '=', $id)->delete()) {
            return redirect('products')->with('success', __('eng.DELETE_SUCCESS'));
        } else {
            return redirect('products')->with('success', __('eng.DELETE_ERROR'));
        }
    }
}
