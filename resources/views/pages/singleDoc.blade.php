<?php
    $title = strtok($doc->orig_filename, '.pdf');
    $content = nl2br($doc->content)
?>
@extends('layouts.default')
@section('right-section')
<div>
    <div class="single-page-container">
        <div class="single-page-title">
        <h3>{{$title}}</h3>
        </div>
        <div class="single-page-content">
        <div class="meta-about flexSep">
<div>
    <h4>Author: </h3>
    <h4>Date Posted: </h3>
</div>
<div>
    <h4>Project Theme: </h3>
    <h4>Project Speciality:</h3>
</div>
            </div>
            <p><?php echo ($content); ?></p>
        </div>
    </div>
</div>


@endsection
