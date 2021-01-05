<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\UserGroup;
use Validator;

class UserGroupController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $userGroup = UserGroup::paginate(3);
        return view('user.userGroup', compact('userGroup'));
    }

    public function create() {
        return view('user.userGroupCreate');
    }

    public function store(Request $request) {
        $rules = [
            'name' => 'required|unique:user_group',
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect('users/userGroupCreate')
                            ->withErrors($validator)
                            ->withInput();
        }
        $userGroup = new UserGroup();
        $userGroup->name = $request->name;
        if ($userGroup->save()) {
            return redirect('userGroup')->with('success',  __('eng.CREATE_SUCCESS'));
        } else {
            return redirect('userGroup/create')->with('success', __('eng.CREATE_ERROR'));
        }
    }

    public function show($id) {
        //
    }

    public function edit($id) {
        $userGroup = UserGroup :: where('id', '=', $id)->first();
        return view('user.userGroupUpdate', compact('userGroup'));
    }

    public function update(Request $request, $id) {
        $rules = [
            'name' => 'required|unique:user_group,name,' . $request->id,
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect('userGroup/edit/' . $request->id)
                            ->withErrors($validator)
                            ->withInput();
        }
        $userGroup = UserGroup::find($id);
        $userGroup->name = $request->name;

        if ($userGroup->save()) {
            return redirect('userGroup')->with('success', __('eng.DELETE_SUCCESS'));
        } else {
            return redirect('userGroup/update')->with('success', __('eng.UPDATE_ERROR'));
        }
    }

    public function destroy($id) {
        if (DB::table('user_group')->where('id', '=', $id)->delete()) {
            return redirect('userGroup')->with('success', __('eng.DELETE_SUCCESS'));
        }
        else{
            return redirect('userGroup')->with('success', __('eng.DELETE_ERROR'));
        }
    }

}
