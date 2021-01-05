<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Validator;

class DashboardController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    

    public function index() {
        return view('user.dashboard');
    }

}
