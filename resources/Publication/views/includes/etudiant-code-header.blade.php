<?php

use Illuminate\Support\Facades\Auth;

if(!(Auth::user()->role == "etudiant_code" || Auth::user() =="etudiant_no_code" )){
    return redirect('/');
}
?>

