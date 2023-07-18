@extends('layouts.visitor.body')
@section('content')

<div>

    <form method="POST" enctype="multipart/form-data" >
        @csrf
        <div class="form-row">
            <div class="form-group">
                <label for="theme">Mot-clé</label>
                <input type="text" class="form-control" id="theme" value="<?php if(isset($oldTerm)){echo $oldTerm;}?>" placeholder="Entree un mot pour faire la recherche" name="searchTerm">
            </div>
            <div class="form-group" style="padding:20px 0px;">
                <button type="submit" class="btn btn-primary">Rechercher</button>
            </div>
        </form>

        <div>
        @if(isset($results))
        @if(count($results) > 0)
            @foreach($results as $doc)
            <h3>{{$doc->theme}}</h3>
            <p>{{$doc->members}} le {{$doc->created_at}}</p>
            <div class="card">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs" id="bologna-list">
                <li class="nav-item">
                    <a class="nav-link active" href="#abstract{{$doc->id}}">Abstract</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#authors{{$doc->id}}">Authors</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#references{{$doc->id}}">References</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#download{{$doc->id}}">Download Doucument</a>
                </li>
                </ul>
            </div>
            <div class="card-body">
            <div class="tab-content mt-3">
                <div class="tab-pane active" id="abstract{{$doc->id}}" role="tabpanel">
                    <p class="card-text">{{$doc->abstract}}</p>
                </div>

                <div class="tab-pane" id="authors{{$doc->id}}" role="tabpanel" aria-labelledby="history-tab">
                    <p class="card-text">{{$doc->members}}</p>
                    <a href="#" class="card-link text-danger">Read more</a>
                </div>

                <div class="tab-pane" id="references{{$doc->id}}" role="tabpanel" aria-labelledby="deals-tab">
                    <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Harum sapiente iusto ullam eligendi numquam fuga error provident quaerat architecto placeat sed necessitatibus officiis reprehenderit, quam, ea nemo facere consequatur fugiat.</p>
                </div>
                <div class="tab-pane" id="download{{$doc->id}}" role="tabpanel" aria-labelledby="deals-tab">

                    <a href="{{route('visitor.downloadPdf',['filePath'=>$doc->memoire_path,'projId'=>$doc->id])}}" class="btn btn-danger btn-sm">Download PDF</a>
                </div>
                </div>
            </div>
            <div class="card-header">
            <p>{{$doc->created_at}}</p>
            </div>
            </div>
            @endforeach
            @else
                <h1 class="text-danger" align="center">Auccun resultat Trouver</h1>
            @endif

        @else
                <h1 class="text-primary" align="center">Rechercher un projet </h1>
        @endif

    </div>
    </div>
@endsection
@section('scripts')
    <script>
        $('#bologna-list a').on('click', function (e) {
        e.preventDefault()
        $(this).tab('show')})
    </script>
@endsection
