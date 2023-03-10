@extends('layouts.admin')
@section('right-section')
    <h1>You have rights to see the admin page</h1>
<br>

    <h1>Unverified Themes</h1>
        @foreach($unverified_themes as $mem)
            <p>{{$mem->theme}}</p>
            <div style="border:1px solid black;width:fit-content;padding:10px">
<!-- <a href="">Verify attestation</a>
<a href="">Verify memoire</a> -->
    <a href="{{route('admin.single_theme', ['theme' => $mem->id])}}">VIEW!!!</a>
            </div>
        @endforeach

    <h1>Verified Themes</h1>
    @foreach($verified_themes as $mem)
            <p>{{$mem->theme}}</p>
        @endforeach
@endsection
