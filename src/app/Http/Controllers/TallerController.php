<?php

namespace App\Http\Controllers;

use App\Models\Taller;
use Illuminate\Http\Request;

class TallerController extends Controller
{
    public function getTalleres() {
        return Taller::all();
    }
}
