<?php

use Illuminate\Support\Facades\Auth;

//  if(Auth()->check()){
//     return redirect()->back();
//  }

?>

@extends('layouts.homePage')
@section('right-section')
<div>
    <div>
        <form class="student-code-login-form" method="POST">
            @csrf
        <i class="fa-solid fa-circle-user fa-6x" style="margin:30px;color:white;"></i>
        <div class="input-section">
                <div class="input-icon-div">
                    <i class="fa-solid fa-address-card fa-lg"></i>
                </div>
            <input class="input-field"type="text" name="name" placeholder="Nom et prenom">
            </div>
            <div class="input-section">
                <div class="input-icon-div">
                    <i class="fa-solid fa-at fa-lg"></i>
                </div>
            <input class="input-field"type="email" name="email" placeholder="email">
            </div>
            <div class="input-section">
                <div class="input-icon-div">
                    <i class="fa fa-key fa-lg"></i>
                </div>
            <input class="input-field" type="password" name="password" placeholder="mot de passe">
            </div>
            <button type="submit">Soumettre <i class="fa-solid fa-right-to-bracket fa-beat" style="margin-left:10px;"></i></button>
        </form>
    </div>
</div>
@endsection
