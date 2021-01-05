<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Product;
use Carbon\Carbon;
use App\User;
use App\Academic;
use App\Category;
use App\UserToProduct;
use Illuminate\Pagination;
use Validator;

class AcademicController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $userList = ['0' => __('eng.PICK_USER')] + User::pluck('name', 'id')->toArray();
        return view('academic.academic', compact('userList'));
    }

    public function create() {
        
    }

    public function store(Request $request) {
        $academicType = $request->level;
        $data = [];
        if (!empty($academicType) && $request->user !=0) {
            foreach ($academicType as $academicName) {
                
                $data[$academicName]['user_id'] = $request->user;
                $data[$academicName]['level'] = $academicName;
                $data[$academicName]['result'] = $request->result;
                $data[$academicName]['year'] = $request->year;
                $data[$academicName]['subject'] = $request->group;
                
            }
            Academic::where('user_id',$request->user)->delete();
            
            if (Academic::insert($data)) {
                return redirect('academic')->with('success', __('eng.PRODUCT_SAVE_SUCCESS'));
            } else {
                return redirect('academic')->with('success', __('eng.PRODUCT_SAVE_ERROR'));
            }
        }
        return redirect('academic')->with('success', __('eng.DATA_EMPTY'));
    }

    public function show($id) {
        
    }

   
    
    public function history(Request $request) {
        $userId = $request->userId;
        $academicHistory = Academic::where('user_id', $userId)->get();
        $details = view('academic.history', compact('academicHistory'))->render();
        return response()->json([
                    'success' => true,
                    'history' => $details,
                        ], 200);
    }

}
