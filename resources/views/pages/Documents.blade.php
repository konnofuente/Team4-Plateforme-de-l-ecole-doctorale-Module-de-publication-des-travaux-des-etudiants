@extends('layouts.default')
@section('right-section')
<!--The General listing of all the available documents would be here brotha men them!-->
    <div>
        <div class="all-docs-container">
        @foreach($docs as $doc)
        <?php
            $txt = nl2br($doc->content);
            $title = strtok($doc->orig_filename, '.pdf');
        ?>
            <div class="single-doc-container">
                <div class="flexArn">
                <div class="pdf-img-display">

                </div>
                <div class="pdf-content-display">
                    <a href="<?php echo route('singleDoc',['docId' => $doc->id])?>">
                    <h4>{{$title}}</h4>
                    <div>
                        <h4>Contents:</h4>
                        <pre>{{$doc->content}}</pre>

                    </div>
                    </a>
                </div>
                <div>
<h4>Author:<u> Ojong Ndip Shey Clinton</u> </h4>
<h4>Theme:<u> Hospital Management System</u></h4>
                        </div>
                </div>

            </div>
        @endforeach
        </div>
    </div>
@endsection
<!-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif -->
