<?php

use Illuminate\Support\Facades\Auth;

if(!Auth::user()->role == "admin"){
    return redirect('/');
}
?>

