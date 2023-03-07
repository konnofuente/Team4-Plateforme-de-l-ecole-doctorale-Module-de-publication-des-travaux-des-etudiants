@extends('layouts.homePage')
@section('right-section')
<div>
    <div>
        <form method="POST" class="student-code-login-form" enctype="multipart/form-data">
            @csrf
        <i class="fa-solid fa-file-certificate fa-6x" style="margin:30px;color:white;"></i>
<div class="grid2" style="gap:50px 100px">
<div>
    <label for="theme" style="position:absolute; bottom:80px;">Theme:</label>
    <div class="input-section" style="height:fit-content;width:100%">
        <div class="input-icon-div">
            <i class="fa-solid fa-input-text fa-lg"></i>
        </div>
    <input class="input-field" type="text" name="theme" placeholder="THEME">
    </div>
    <label for="description" >Description:</label>
    <textarea name="description" id="description" cols="30" rows="3" ></textarea>
</div>


        <div class="grid2" style="gap:10px">
            <div class="input-section">
                <div class="input-icon-div">
                    <i class="fa-solid fa-at fa-lg"></i>
                </div>
            <input class="input-field" type="email" name="chef_email" placeholder="EMAIL(CHEF)">
            </div>
            <div class="input-section">
                <div class="input-icon-div">
                <i class="fa-solid fa-address-card fa-lg"></i>
                </div>
            <input class="input-field" type="text" name="chef_name" placeholder="NOM ET PRENOM(CHEF)">
            </div>
            <div class="input-section">
                <div class="input-icon-div">
                    <i class="fa-solid fa-address-book fa-lg"></i>
                </div>
            <input class="input-field" type="tel" name="chef_tel" placeholder="TELEPHONE(CHEF)">
            </div>
            <div class="input-section">
                <div class="input-icon-div">
                    <i class="fa-solid fa-key fa-lg"></i>
                </div>
            <input class="input-field" type="password" name="chef_pass" placeholder="mot de passe">
            </div>
        </div>

<!-- DIVIDERRRRR -->


        <div class="grid2">
            <div class="input-section">
                <div class="input-icon-div">
                    <i class="fa-solid fa-at fa-lg"></i>
                </div>
            <input class="input-field" type="email" name="auth_1_email" placeholder="EMAIL(ETUDIANT-1)">
            </div>
            <div class="input-section">
                <div class="input-icon-div">
                    <i class="fa-solid fa-address-card fa-lg"></i>
                </div>
            <input class="input-field" type="text" name="auth_1_name" placeholder="NOM ET PRENOM(ETUDIANT-1)">
            </div>
            <div class="input-section">
                <div class="input-icon-div">
                <i class="fa-solid fa-address-book fa-lg"></i>
                </div>
            <input class="input-field" type="tel" name="auth_1_tel" placeholder="TELEPHONE(ETUDIANT-1)">
            </div>
        </div>
        <div class="grid2">
            <div class="input-section">
                <div class="input-icon-div">
                    <i class="fa-solid fa-at fa-lg"></i>
                </div>
            <input class="input-field" type="email" name="auth_2_email" placeholder="EMAIL(ETUDIANT-2)">
            </div>
            <div class="input-section">
                <div class="input-icon-div">
                    <i class="fa-solid fa-address-card fa-lg"></i>
                </div>
            <input class="input-field" type="text" name="auth_2_name" placeholder="NOM ET PRENOM(ETUDIANT-2)">
            </div>
            <div class="input-section">
                <div class="input-icon-div">
                <i class="fa-solid fa-address-book fa-lg"></i>
                </div>
            <input class="input-field" type="tel" name="auth_2_tel" placeholder="TELEPHONE(ETUDIANT-2)">
            </div>
        </div>
        <div class="grid2">
            <div>
                <label for="attestation">Attestation de soutenance</label>
                <input type="file" name="defense-attestation" id="attestation">
            </div>

            <div>
                <label for="attestation">Memoire de soutenance</label>
                <input type="file" name="defense-thesis" id="memoire">
            </div>
        </div>

</div>
            <button type="submit">Soumettre <i class="fa-solid fa-right-to-bracket fa-beat" style="margin-left:10px;"></i></button>
        </form>
    </div>
</div>
@endsection
