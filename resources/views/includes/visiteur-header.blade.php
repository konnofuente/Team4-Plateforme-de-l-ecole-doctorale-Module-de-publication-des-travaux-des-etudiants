<?php

use Illuminate\Support\Facades\Auth;

if(!Auth::user()->role == "visiteur"){
    return redirect('/');
}
?>
