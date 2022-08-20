<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\MahsulotController;

class Mahsulots extends Model
{
    use HasFactory;

    protected $table = 'mahsulots';
    protected $fillable = array('name', 'price');
}
