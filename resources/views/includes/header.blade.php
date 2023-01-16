<div class="header-nav">
    <div class="header flex">
        <div class="logo">
            Team 4
        </div>
        <div class="signIn flex" >
            <button>Inscrivez Vous</button>
            <button>Connecte vous</button>
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
                <a href="<?php echo route('file')?>">Search</a>
                <a href="<?php echo route('file')?>">Documentation</a>
                <a href="<?php echo route('file')?>">About</a>
                <a href="<?php echo route('file')?>">News</a>

            </div>
        </div>
    @stop
    <!-- @section('right-section')
        <p>THis is the right section</p>
    @stop -->
</div>
