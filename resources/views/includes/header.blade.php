
<div class="header-nav">
    <div class="header flex">
        <div class="logo">
            <img src="{{ Vite::asset('resources/images/icon.svg') }}" alt="">
            <h1>COF</h1>
        </div>
        <div class="signIn flexArn">
        @if(Auth()->check())
        <div class="flexArn loogenInHeader">

            <p style="margin:15px;">
            <i style="margin:5px" class="fa-xl fa-solid fa-circle-user"></i>{{Auth()->user()->email}}</p>

            <p style="margin:15px;">
            <i class="fa-lg fa-solid fa-bell"></i>
            </p>

            <p style="margin:15px;">
            <i class="fa-lg fa-solid fa-gear"></i>
            </p>
        </div>
        @else
        <a class="button" href="{{route('signin.visiteur')}}" >Se connecter
        <i class="fa-solid fa-right-to-bracket" style="margin-left:10px;"></i></a>
            <a class="button" href="{{route('signup.visiteur')}}">S'inscrire
            <i class="fa-solid fa-user-plus" style="margin-left:10px;"></i></a>
        @endif
        </div>
    </div>
    <div class="beauty">
        <div class="pic-section">
            <div class="pic-text">
            <p><b>Téléchargez vos rapports de soutenance</b></p>
            </div>

            </div>
    </div>
    @section('left-section')
        <div class="nav-div-container">
            <div class="nav-div">
                <a href="">Voir les Themes</a>
                <a href="">Recherche Themes</a>
                <a href="">Recherche Auteurs</a>
                <a href="">A propos du site</a>
            @if(Auth()?->user()?->role == 'admin')
                <a href="">Gerer les Themes</a>
                <a href="">Gerer les etudiants</a>
                <a href="">Gerer les admin</a>
                <a href="">Mon Compte</a>
            @elseif((Auth()?->user()?->role == 'etudiant_code') || Auth()?->user()?->role == 'etudiant_no_code')
                <a href="">Gerer Mes Documents</a>
                <a href="">Contacter admin</a>
                <a href="">Mon Compte</a>
            @elseif(Auth()?->user()?->role == 'visiteur')
                <a href="">Publier Documents</a>
                <a href="">Mon Compte</a>
            @endif
            </div>
        </div>
    @stop
</div>

