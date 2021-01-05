<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Category;
use Illuminate\Pagination;
use Validator;

class CategoryController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function index()
    {
        
        $category = Category::paginate(3);
        return view('category.categories', compact('category'));
    }
    public function create()
    {
        $statusList = ['1' => __('eng.ACTIVE'), '2' => __('eng.INACTIVE')];
        return view('category.create')->with(compact('statusList'));
    }

    public function store(Request $request) {
        $rules = [
            'name' => 'required|unique:user_group',
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect('categories/create')
                            ->withErrors($validator)
                            ->withInput();
        }
        $category = new Category();
        $category->name = $request->name;
        $category->status = !empty($request->status) ? $request->status : '0';
        if ($category->save()) {
            return redirect('categories')->with('success',  __('eng.CREATE_SUCCESS'));
        } else {
            return redirect('categories/create')->with('success', __('eng.CREATE_ERROR'));
        }
    }

   
    public function show($id)
    {
        
    }

   
    public function edit($id) {
        $categories = Category::where('id', '=', $id)->first();
        return view('category.update', compact('categories'));
    }

    
    public function update(Request $request, $id) {
        $rules = [
            'name' => 'required|unique:user_group',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect('categories/edit/' . $request->id)
                            ->withErrors($validator)
                            ->withInput();
        }

        $category = Category::find($id);
        $category->name = $request->name;
        $category->status = !empty($request->status) ? $request->status : '0';
        if ($category->save()) {
            return redirect('categories')->with('success', __('eng.UPDATE_SUCCESS'));
        } else {
            return redirect('update')->with('success', __('eng.UPDATE_ERROR'));
        }
    }

    
    public function destroy($id) {
        if (DB::table('categories')->where('id', '=', $id)->delete()) {
            return redirect('categories')->with('success', __('eng.DELETE_SUCCESS'));
        } else {
            return redirect('categories')->with('success', __('eng.DELETE_ERROR'));
        }
    }
}
