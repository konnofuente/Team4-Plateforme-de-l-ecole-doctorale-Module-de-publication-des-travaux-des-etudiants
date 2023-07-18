@extends('layouts.visitor.body')
@section('content')
    <div>
        @foreach($projects as $doc)
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
              </div>

              <div class="tab-pane" id="references{{$doc->id}}" role="tabpanel" aria-labelledby="deals-tab">
                <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Harum sapiente iusto ullam eligendi numquam fuga error provident quaerat architecto placeat sed necessitatibus officiis reprehenderit, quam, ea nemo facere consequatur fugiat.</p>
              </div>
              <div class="tab-pane" id="download{{$doc->id}}" role="tabpanel" aria-labelledby="deals-tab">

                <a href="{{route('visitor.downloadPdf',['filePath'=>$doc->memoire_path,'projId'=>$doc->id])}}" class="btn btn-danger btn-sm">Telecharger Le memoire</a>
              </div>
            </div>
        </div>
        <div class="card-header">
        <p>{{$doc->created_at}}</p>
        </div>
        </div>
        @endforeach

    </div>
@endsection

@section('scripts')
    <script>
        $('#bologna-list a').on('click', function (e) {
        e.preventDefault()
        $(this).tab('show')})
    </script>
@endsection
