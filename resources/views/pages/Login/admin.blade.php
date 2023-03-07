@extends('layouts.homePage')
@section('right-section')
<div>
    <div>
        <form method="POST" class="student-code-login-form">
            @csrf
        <i class="fa-solid fa-user-gear fa-6x" style="margin:30px;color:white;"></i>
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
