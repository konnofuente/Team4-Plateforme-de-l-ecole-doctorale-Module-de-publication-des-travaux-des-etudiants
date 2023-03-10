<?php

use Illuminate\Support\Facades\Auth;


if(!Auth::check()){
    return redirect(to_route('homePage'));
    if(!Auth::user()->role == "admin"){
        return to_route('homePage');
    }
}

?>

