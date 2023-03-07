
<div class="header-nav">
    <div class="header flex">
        <div class="logo">
            <img src="{{ Vite::asset('resources/images/icon.svg') }}" alt="">
            <h1>COF</h1>
        </div>
        <div class="signIn flexArn">
        <a class="button" href="{{route('signin.visiteur')}}" >Se connecter
        <i class="fa-solid fa-right-to-bracket" style="margin-left:10px;"></i></a>
            <a class="button" href="{{route('signup.visiteur')}}">S'inscrire
            <i class="fa-solid fa-user-plus" style="margin-left:10px;"></i></a>
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


            </div>
        </div>
    @stop
</div>
