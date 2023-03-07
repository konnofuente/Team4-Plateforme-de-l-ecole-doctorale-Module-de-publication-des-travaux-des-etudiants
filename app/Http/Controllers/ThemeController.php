<?php

namespace App\Http\Controllers;

use App\Models\themes;
use Illuminate\Http\Request;

class ThemeController extends Controller
{
    public function get_all_memoires(){
        $memoires = themes::all();
        return view('pages.Admin.home');
    }

    public function visiteur_login(Request $request){

    }
}

?>
