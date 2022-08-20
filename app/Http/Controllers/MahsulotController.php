<?php

namespace App\Http\Controllers;

//use App\Models\Mahsulot;
//use App\Http\Controllers\MahsulotController;

use App\Mahsulot;
use Illuminate\Http\Request;
class Mahsulots extends Controller
{
    public function getAll(){
        $mahsulots = Mahsulot::all();
        return $mahsulots;
    }
     public function add(Request $request)
     {
         $mahsulots = Mahsulot::create($request->all());
         return 'malumot qoshildi';
     }

     // Mahsulotni ko'rish
     public function get($id)
{
    $mahsulot = Mahsulot::all();
    return $mahsulot;
}

    // Mahsulotni o'chirish
    public function delete($id)
    {
        $mahsulot = $this->get($id);
        $mahsulot->delete();
        return 'mahsulot ochirildi';
    }

    // Mahsulotni taxrirlash
    public function edit($id, Request $request)
    {
        $mahsulot = $this->get($id);
        $mahsulot->fill($request->all())->save();
        return 'Mahsulot uzgardi';
    }
}

