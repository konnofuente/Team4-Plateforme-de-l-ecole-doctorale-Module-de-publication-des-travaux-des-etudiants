<?php

use Illuminate\Support\Facades\Auth;

if(!Auth::user()->role == "etudiant_no_code"){
    return redirect('/');
}
?>
