<?php

namespace App\Http\Controllers;

use DB;
use PDF;
use Excel;
use Auth;
use Illuminate\Http\Request;
use Hash;
use Illuminate\Pagination;
use Validator;
use App\Product;
use App\User;
use App\Category;
use App\UserToProduct;
use App\Exports\ProductExport;

class ProductReportController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Request $request) {
        $viewFile = 'productReport.pdf';
        $userList = User::get();
        $prosuctList = UserToProduct::join('products', 'user_to_product.product_id', '=', 'products.id')
                ->select('user_to_product.*', 'products.name as product_name')
                ->get();

        if ($request->file == "print") {
            return view('productReport.pdf')->with(compact('userList', 'prosuctList'));
        } elseif ($request->file == "pdf") {
            $pdf = PDF::loadView('productReport.pdf', compact('userList', 'prosuctList'));
            return $pdf->download('pdf_file.pdf');
        } elseif ($request->file == "xls") {
            $data = [
                'userList' => $userList,
                'prosuctList' => $prosuctList,
            ];
            return Excel::download(new ProductExport($viewFile, $data), 'report.xls');
        }
        return view('productReport.productReport', compact('userList', 'prosuctList'));
    }
}
