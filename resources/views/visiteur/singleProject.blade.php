@extends('layouts.visitor.body')
@section('content')
    <div class="card">
        <div class="card-header" style="display:flex;justify-content:space-between">
            <p>Theme : <b> {{$selected->theme}} </b></p>
            <p> Date : <b>{{$selected->created_at}}</b></p>
        </div>
        <div class="card-body">
            <div> <!--Project Members-->
                <p style="color:#0d6efd;">
                        <i class="fa-2x bi bi-people"></i>
                        <b style="position:relative;bottom:5px;left:5px;">{{$selected->members}}</b>
                </p>
            </div>
            <div> <!--Project Abstract-->
                <div style="display:flex;justify-content:space-between">
                    <h4>Abstract</h4>
                    <h5>Categorie : {{$selected->domaine}}</h5>
                </div>
                <div>

                    <p style="color:#798eb3;">
                        {{$selected->abstract}}
                    </p>
                </div>
            </div>
            <div> <!--PDF display-->
            <embed src="{{ asset("uploads/themes/$selected->theme/memoire/$selected->memoire_path") }}" type="application/pdf" width="100%" height="600px" >
            </div>
            <br>
            <br>
            <div> <!--Person a contacter-->
                <h4>Plus d'info ?</h4>
                <p>
                    <a href="mailto:{{$selected->chef_email}}">
                        <i class="bi bi-envelope-fill"></i> {{$selected->chef_email}}
                    </a>
                </p>
                <p>
                    <a href="mailto:{{$selected->encadreur_email}}">
                        <i class="bi bi-envelope-fill"></i> {{$selected->encadreur_email}}
                    </a>
                </p>
            </div>

        </div>
        <div class="card-footer" style="display:flex;justify-content:space-between">
            <div>
                <h4>ResearchHub</h4>
            </div>
            <div class="social-linkss">
                <a href="whatsapp://send?text=Take a look at this project https://cof.camairetech.com/project/{{$selected->id}}" target="_blank">
                    <i class="fa-2x bi bi-whatsapp" style="color:#25D366"></i>
                </a>
                <a href="https://twitter.com/intent/tweet?text=Take a look at this awesome project https://cof.camairetech.com/project/{{$selected->id}}" target="_blank">
                    <i class="fa-2x bi bi-twitter" style="color:#1DA1F2"></i>
                </a>
                <a href="https://t.me/share/url?url=https://cof.camairetech.com/project/{{$selected->id}}&text=Take a look at this awesome project" target="_blank">
                    <i class="fa-2x bi bi-telegram" style="color:#0088cc"></i>
                </a>
                <a href="https://facebook.com/sharer/sharer.php?u=https://cof.camairetech.com/project/{{$selected->id}}" target="_blank">
                    <i class="fa-2x bi bi-facebook" style="color:#1877f2"></i>
                </a>
            </div>
        </div>
    </div>
    <style>
        h4{
            font-variant: small-caps;
        }
        .social-linkss a{
            padding-right: 10px;
        }
    </style>
@endsection

