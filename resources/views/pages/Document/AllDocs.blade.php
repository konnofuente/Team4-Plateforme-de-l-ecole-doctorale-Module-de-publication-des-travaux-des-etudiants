@extends('layouts.visiteur')
@section('right-section')
<div class="themes-container">
    @foreach($themes as $theme)
    <a href="{{route('memoires.viewOne',['id'=>$theme->id])}}">
        <div class="single-theme-row">
            <div class="theme-group-item">
                <div class="head flexSep">
                    <p>THEME : {{$theme->theme}}</p>
                     <p>AUTEUR : {{$theme->chef_email}}</p>
                </div>
                <div class="body">
                    <p>A propos : {{$theme->description}}</p>
                    @if($theme->isValid == true)
                    <p class="success">verifier</p>
                    @else
                    <p class="error">Non Verifier</p>
                    @endif
                </div>
                <div class="footer">
                    <p>Date publier : {{$theme->created_at}}</p>
                </div>
            </div>
        </div>
        </a>
    @endforeach
</div>

@endsection
