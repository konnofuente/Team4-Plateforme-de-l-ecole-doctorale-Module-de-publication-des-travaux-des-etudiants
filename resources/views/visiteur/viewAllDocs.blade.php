@extends('layouts.visitor.body')
@section('content')
<?php
    function extractKeyWords($string) {
        mb_internal_encoding('UTF-8');
        $stopwords = array('i','a','about','an','and','are','as','at','be','by','com','de','en','for','from','how','in','is','it','la','of','on','or','that','the','this','to','was','what','when','where','who','will','with','und','the','www','je' , 'un' , 'environ' , 'un' , 'et', 'sont' , 'comme', 'à', 'être', 'par', 'com', 'de', 'en', 'pour', 'de', 'comment', 'dans', 'est' , 'il', 'la', 'sur', 'cela', 'le', 'ceci', 'à', 'était','quoi','quand','où','qui','va','avec','et','le','www');
        $string = preg_replace('/[\pP]/u', '', trim(preg_replace('/\s\s+/iu', '', mb_strtolower($string))));
        $matchWords = array_filter(explode(' ',$string) , function ($item) use ($stopwords) { return !($item == '' || in_array($item, $stopwords) || mb_strlen($item) <= 2 || is_numeric($item));});
        $wordCountArr = array_count_values($matchWords);
        arsort($wordCountArr);
        return array_keys(array_slice($wordCountArr, 0, 10));
      }
?>
    <div>
        @foreach($projects as $doc)
        <h3 style="color:#0d6efd;">{{$doc->theme}}</h3>
        <p><b>{{$doc->members}}</b> le {{$doc->created_at}}</p>
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
                <a class="nav-link" href="#references{{$doc->id}}">Keywords</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#download{{$doc->id}}">Download Doucument</a>
            </li>
            </ul>
        </div>
        <div class="card-body">
        <div class="tab-content mt-3">
              <div class="tab-pane active" id="abstract{{$doc->id}}" role="tabpanel" style="max-height:125px;overflow:hidden;">
                <p style="
                     display: -webkit-box;-webkit-line-clamp: 5;-webkit-box-orient: vertical; line-height:25px;text-overflow:ellipsis;
                ">{{$doc->abstract}}</p>
              </div>

              <div class="tab-pane" id="authors{{$doc->id}}" role="tabpanel" aria-labelledby="history-tab">
                <p class="card-text">{{$doc->members}}</p>
              </div>

              <div class="tab-pane" id="references{{$doc->id}}" role="tabpanel" aria-labelledby="deals-tab">
                <?php
                    $theKeyWords = extractKeyWords($doc->abstract)
                ?>
                <div class="keywords-box">
                    @foreach($theKeyWords as $word)
                        <p class="single-keyword">{{$word}}</p>
                    @endforeach
                </div>
              </div>
              <div class="tab-pane" id="download{{$doc->id}}" role="tabpanel" aria-labelledby="deals-tab">

                <a href="{{route('visitor.downloadPdf',['filePath'=>$doc->memoire_path,'projId'=>$doc->id])}}" class="btn btn-danger btn-sm">Telecharger Le memoire</a>
              </div>
            </div>
        </div>
        <div class="card-footer" style="display:flex;justify-content:space-between;">
            <p style="color:#848482;">{{$doc->created_at}}</p>
            <div>
                <a  href="{{route('visiteur.single',$doc->id)}}">
        <i class="bi bi-arrows-angle-expand"></i>
                    <!-- <i class="bi bi-whatsapp"></i> -->
                </a>
            </div>
        </div>
        </div>
        @endforeach
    </div>

    <style>
        div.keywords-box{
            display: grid;
            grid-template-columns: 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr;
        }
        p.single-keyword{
            border: none;
            color: white;
            background-color: #1e1e1e;
            width: fit-content;
            padding: 10px;
            margin-left:5px;
            border-radius: 4px;
        }
        @media only screen and (max-width: 767px){
            div.keywords-box{
                grid-template-columns: 1fr 1fr 1fr 1fr;
            }
        }
        @media only screen and (max-width: 469px){
            div.keywords-box{
                grid-template-columns: 1fr 1fr;
            }
        }
    </style>
@endsection

@section('scripts')
    <script>
        $('#bologna-list a').on('click', function (e) {
        e.preventDefault()
        $(this).tab('show')})
    </script>
@endsection
