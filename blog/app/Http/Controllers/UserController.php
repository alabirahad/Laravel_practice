<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\UserGroup;
use App\Course;
use Illuminate\Pagination;
use Validator;

class UserController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Request $request) {
        $data = $request->all();

        $users = User::with('course')->join('user_group', 'users.user_group', '=', 'user_group.id')
                ->select('users.*', 'user_group.id as user_group_id', 'user_group.name as user_group_name');

        if (!empty($request->course)) {
            $users = $users->where('course_id', $request->course);
        }
        
        if (!empty($request->userGroup)) {
            $users = $users->where('user_group', $request->userGroup);
        }
        
        if (!empty($request->name)) {
            $name = $request->name;
            $users = $users->where('users.name', 'like', '%' . $name . '%');
        }
        
        if (!empty($request->phone)) {
            $phone = $request->phone;
            $users = $users->where('number', 'like', '%' . $phone . '%');
        }
        
        
        $users = $users->paginate(3);
        
        
        $userGroupList = UserGroup::pluck('name', 'id')->toArray();
        $courseList = Course::pluck('name', 'id')->toArray();
        
//        echo '<pre>'; print_r($courseList); exit;
        return view('user.users')->with(compact('users', 'data', 'userGroupList','courseList'));
    }

    public function create() {
        $userGroupList = UserGroup::pluck('name', 'id')->toArray();
        $courseList = Course::pluck('name', 'id')->toArray();
        $statusList = ['1' => __('eng.ACTIVE'), '2' => __('eng.INACTIVE')];
        return view('user.create')->with(compact('statusList', 'userGroupList', 'courseList'));
    }

    public function store(Request $request) {

//        echo '<pre>'; print_r($request->all()); exit;
        $rules = [
            'userGroup' => 'required',
            'course_id' => 'required',
            'name' => 'required',
            'username' => 'required|unique:users',
            'password' => 'required|min:5',
            'email' => 'required|unique:users',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->all()], 422);
        }
        $user = new User();
        $user->user_group = $request->userGroup;
        $user->course_id = $request->course_id;
        $user->name = $request->name;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->email = $request->email;
        $user->number = $request->number;
        $user->designation = $request->designation;
        $user->status = !empty($request->status) ? $request->status : '0';
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $image_name = time() . '_' . $image->getClientOriginalName();
            $user->photo = $image_name;
            $image->move("public/uploads/users/", $image_name);
        }
        $user->address = $request->address;
        $user->city = $request->city;
        $user->country = $request->country;
        $user->postalcode = $request->postalcode;
        if ($user->save()) {
            return response()->json([
                        'success' => true,
                        'msg' => 'record updated'
                            ], 200);
        } else {
            return response()->json([
                        'success' => false,
                        'msg' => 'errors'
                            ], 401);
        }
    }

    public function destroy($id) {
        if (DB::table('users')->where('id', '=', $id)->delete()) {
            return redirect()->route('users')->with('success', __('eng.DELETE_SUCCESS'));
        } else {
            return redirect('users')->with('success', __('eng.DELETE_ERROR'));
        }
    }

    public function edit($id) {
        $userGroupList = UserGroup::pluck('name', 'id')->toArray();
        $courseList = Course::pluck('name', 'id')->toArray();
        $users = User::where('id', '=', $id)->first();
        return view('user.update', compact('users', 'userGroupList', 'courseList'));
    }

    public function update(Request $request, $id) {
        $rules = [
            'userGroup' => 'required',
            'course_id' => 'required',
            'name' => 'required',
            'username' => 'required|unique:users,username,' . $request->id,
            'email' => 'required|unique:users,email,' . $request->id,
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect('users/edit/' . $request->id)
                            ->withErrors($validator)
                            ->withInput();
        }

        $user = User::find($id);
        $user->user_group = $request->userGroup;
        $user->course_id = $request->course_id;
        $user->name = $request->name;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->email = $request->email;
        $user->number = $request->number;
        $user->designation = $request->designation;
        $user->status = !empty($request->status) ? $request->status : '0';
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $image_name = time() . '_' . $image->getClientOriginalName();
            $user->photo = $image_name;
            $image->move("public/uploads/users/", $image_name);
        }
        $user->address = $request->address;
        $user->city = $request->city;
        $user->country = $request->country;
        $user->postalcode = $request->postalcode;

        if ($user->save()) {
            return redirect()->route('users')->with('success', __('eng.UPDATE_SUCCESS'));
        } else {
            return redirect('update')->with('success', __('eng.UPDATE_ERROR'));
        }
    }

    public function filter(Request $request) {
        $course = $request->course;
        $userGroup = $request->userGroup;
        $name = $request->name;
        $phone = $request->phone;
        $url = 'course=' . $course .'&userGroup=' . $userGroup . '&name=' . $name . "&phone=" . $phone;
        return redirect('users?' . $url);
    }

    public function details(Request $request) {
        $id = $request->userid;
        $users = User::where('id', '=', $id)->first();

        $details = view('user.userDetails', compact('users'))->render();
//        echo $details;
//        return view('user.userDetails', compact('users'));

        return response()->json([
                    'success' => true,
                    'msg' => $details,
                        ], 200);
    }

}
