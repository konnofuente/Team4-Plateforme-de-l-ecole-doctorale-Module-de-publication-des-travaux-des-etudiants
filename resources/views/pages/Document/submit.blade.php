@extends('layouts.homePage')
@section('right-section')
<div>
    <div>
        <form action="" class="student-code-login-form">
        <i class="fa-solid fa-file-certificate fa-6x" style="margin:30px;color:white;"></i>
            <div class="input-section">
                <div class="input-icon-div">
                    <i class="fa-solid fa-at fa-lg"></i>
                </div>
            <input class="input-field"type="email" placeholder="email">
            </div>
            <div class="input-section">
                <div class="input-icon-div">
                    <i class="fa fa-key fa-lg"></i>
                </div>
            <input class="input-field" type="password" placeholder="mot de passe">
            </div>
            <button type="submit">Soumettre <i class="fa-solid fa-right-to-bracket fa-beat" style="margin-left:10px;"></i></button>
        </form>
    </div>
</div>
@endsection
