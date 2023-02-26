
<div class="header-nav">
    <div class="header flex">
        <div class="logo">
            <img src="{{ Vite::asset('resources/images/icon.svg') }}" alt="">
            <h1>COF</h1>
        </div>
        <div class="signIn flexArn" >
            <!-- <button>Inscrivez Vous</button> -->
            <a href="http://" target="_blank" rel="noopener noreferrer">Sign In</a>
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
                <a href="<?php echo route('file')?>">Home</a>
                <a href="<?php echo route('submit')?>">Submit</a>
                <a href="<?php echo route('documents')?>">Documents</a>
                <a href="<?php echo route('Document.search')?>">Rechercher</a>
                <a href="<?php echo route('file')?>">About</a>
                <a href="<?php echo route('file')?>">News</a>

            </div>
        </div>
    @stop
</div>
