<?php
namespace App\Exports;
use App\User;
use App\UserToProduct;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;


class ProductExport implements FromView{
    public function __construct($viewFile, $data) {
        $this->viewFile = $viewFile;
        $this->data = $data;
        }

        public function view(): View{ 
        return view($this->viewFile,$this->data);
    }

}