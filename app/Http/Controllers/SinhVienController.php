<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SinhVienController extends Controller
{
    public function showInformation(){
        $Informations = [
            [
                'id' => '1',
                'name' => 'Lê Minh Hoàng',
                'age' => '20',
                'mssv' => 'PH42302',
                'hometown' => 'Hà Nội'
            ]
        ];
        return view('information')->with([
            'informations' => $Informations
        ]);
    }
}
