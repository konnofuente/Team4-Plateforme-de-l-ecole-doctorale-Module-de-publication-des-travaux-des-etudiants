@extends('layouts.homePage')
@section('right-section')
<div class="home-main-container">
    <div class="grid2">
<div class="useCase-box">
    <h2 class="usecase-title">Connexion étudiant avec code</h2>
        <p class="useCaseText">Êtes-vous un étudiant qui a récemment soumis des documents sur le site Web et qui a reçu avec succès un code de connexion par courrier? <br>
        Avec votre code de connexion, vous auriez un label "auteur" lorsque vous commentez ou répondez aux questions posées par d'autres sur votre thèse de soutenance. <br>
        Cliquez ici pour vous connecter en utilisant le code unique qui vous a été accordé !
        </p>
    <a href="{{route('login.student.code')}}" class="button">Connexion étudiant</a>
</div>
<div class="useCase-box">
    <h2 class="usecase-title">Connexion admin</h2>
        <p class="useCaseText">Êtes-vous un administrateur ayant le droit de vérifier la thèse de soutenance et tout autre document téléchargé par les étudiants?<br>
        Connectez-vous ici pour consulter les différents documents qui vous ont été attribués.<br>
        Après vérification, vous auriez le choix entre accepter et valider ou refuser et envoyer un mail à l'étudiant sur ce qui manque ou est incorrect parmi les documents.<br>
        </p>
    <a href="{{route('login.admin')}}" class="button">Connexion admin</a>
</div>
        <div class="useCase-box">
            <h2 class="usecase-title">Nouvel étudiant</h2>
            <p class="useCaseText">Sous êtes ici pour déposer votre mémoire de soutenance et les dossiers requis afin qu'ils soient vérifiés et corrigés par un administrateur ?</p>
            <a href="{{route('login.normal')}}" class="button">Submit Docs Page</a>
        </div>
        <div class="useCase-box">
            <h2 class="usecase-title">Visiteur</h2>
            <p class="useCaseText">Voulez-vous simplement visiter et télécharger des thèses de rapport rédigées par divers auteurs?</p>
            <a href="" class="button">visiter le site</a>
        </div>
    </div>
</div>
@endsection
