<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Product;
use Carbon\Carbon;
use App\User;
use App\Category;
use App\UserToProduct;
use Illuminate\Pagination;
use Validator;

class UserToProductController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $categoryList = ['0' => __('eng.PICK_CATEGORY')] + Category::pluck('name', 'id')->toArray();
        $userList = ['0' => __('eng.PICK_USER')] + User::pluck('name', 'id')->toArray();
        return view('userToProduct.userToProducts', compact('userList', 'categoryList'));
    }

    public function create() {
        
    }

    public function store(Request $request) {
//        $rules = [
//            'user' => 'required',
//        ];
//        $validator = Validator::make($request->all(), $rules);
//
//        if ($validator->fails()) {
//            return redirect('usertoproducts')
//                            ->withErrors($validator)
//                            ->withInput();
//        }

        $productId = $request->check;
        $data = [];
        if (!empty($productId) && !empty($request->user)) {
            foreach ($productId as $product) {
                
                $data[$product]['user_id'] = $request->user;
                $data[$product]['product_id'] = $product;
                $data[$product]['updated_by'] = Auth::user()->id;
                $data[$product]['updated_at'] = Carbon::now()->toDateTimeString();
                
            }
            UserToProduct::where('user_id',$request->user)->delete();
            
            if (UserToProduct::insert($data)) {
                return redirect('usertoproducts')->with('success', __('eng.PRODUCT_SAVE_SUCCESS'));
            } else {
                return redirect('usertoproducts')->with('success', __('eng.PRODUCT_SAVE_ERROR'));
            }
        }
        return redirect('usertoproducts')->with('success', __('eng.DATA_EMPTY'));
    }

    public function show($id) {
        
    }

    public function edit($id) {
        
    }

    public function update(Request $request, $id) {
        
    }

    public function destroy($id) {
        
    }

    public function details(Request $request) {
        $categoryId = $request->categoryId;
        $userId = $request->userId;
        $products = Product::where('category', $categoryId)->get();
        $userProducts = UserToProduct::where('user_id', $userId)->get();
        $data = [];
        foreach ($userProducts as $userProduct) {
            $data[$userProduct->product_id] = $userProduct->user_id;
        }
        $details = view('userToProduct.productDetails', compact('products', 'userId', 'userProducts', 'data'))->render();
        return response()->json([
                    'success' => true,
                    'products' => $details,
                        ], 200);
    }

}
