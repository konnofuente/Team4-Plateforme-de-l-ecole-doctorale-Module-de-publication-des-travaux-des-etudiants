@extends('layouts.homePage')
@section('right-section')
<div>
    <div>
        <form action="" class="student-code-login-form">
        <i class="fa-solid fa-file-certificate fa-6x" style="margin:30px;color:white;"></i>
<div class="grid2" style="gap:50px 100px">
<div>
    <label for="theme" style="position:absolute; bottom:80px;">Theme:</label>
    <div class="input-section" style="height:fit-content;width:100%">
        <div class="input-icon-div">
            <i class="fa-solid fa-at fa-lg"></i>
        </div>
    <input class="input-field"type="email" placeholder="THEME">
    </div>
    <label for="theme" >Description:</label>
    <textarea name="" id="" cols="30" rows="3" ></textarea>
</div>


        <div class="grid2" style="gap:10px">
            <div class="input-section">
                <div class="input-icon-div">
                    <i class="fa-solid fa-at fa-lg"></i>
                </div>
            <input class="input-field"type="email" placeholder="EMAIL(CHEF)">
            </div>
            <div class="input-section">
                <div class="input-icon-div">
                <i class="fa-solid fa-address-card fa-lg"></i>
                </div>
            <input class="input-field" type="text" placeholder="NOM ET PRENOM(CHEF)">
            </div>
            <div class="input-section">
                <div class="input-icon-div">
                    <i class="fa-solid fa-address-book fa-lg"></i>
                </div>
            <input class="input-field" type="tel" placeholder="TELEPHONE(CHEF)">
            </div>
        </div>

<!-- DIVIDERRRRR -->


        <div class="grid2">
            <div class="input-section">
                <div class="input-icon-div">
                    <i class="fa-solid fa-at fa-lg"></i>
                </div>
            <input class="input-field"type="email" placeholder="EMAIL(ETUDIANT-1)">
            </div>
            <div class="input-section">
                <div class="input-icon-div">
                    <i class="fa-solid fa-address-card fa-lg"></i>
                </div>
            <input class="input-field" type="text" placeholder="NOM ET PRENOM(ETUDIANT-1)">
            </div>
            <div class="input-section">
                <div class="input-icon-div">
                <i class="fa-solid fa-address-book fa-lg"></i>
                </div>
            <input class="input-field" type="tel" placeholder="TELEPHONE(ETUDIANT-1)">
            </div>
        </div>
        <div class="grid2">
            <div class="input-section">
                <div class="input-icon-div">
                    <i class="fa-solid fa-at fa-lg"></i>
                </div>
            <input class="input-field"type="email" placeholder="EMAIL(ETUDIANT-2)">
            </div>
            <div class="input-section">
                <div class="input-icon-div">
                    <i class="fa-solid fa-address-card fa-lg"></i>
                </div>
            <input class="input-field" type="text" placeholder="NOM ET PRENOM(ETUDIANT-2)">
            </div>
            <div class="input-section">
                <div class="input-icon-div">
                <i class="fa-solid fa-address-book fa-lg"></i>
                </div>
            <input class="input-field" type="tel" placeholder="TELEPHONE(ETUDIANT-2)">
            </div>
        </div>
        <div class="grid2">
            <div>
                <label for="attestation">Attestation de soutenance</label>
                <input type="file" name="defense-attestation" id="attestation">
            </div>
            <div>
                <label for="attestation">Fiche d'inscription</label>
                <input type="file" name="inscription-file" id="fiche-inscription">
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
