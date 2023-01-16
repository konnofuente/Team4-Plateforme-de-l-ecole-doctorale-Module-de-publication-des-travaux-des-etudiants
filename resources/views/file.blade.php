@if (Session::has('success'))
{{ session()->get('success') }}

@endif

@extends('layouts.default')
@section('right-section')
<div class="home-main-container">
    <div>
        <div class="flex">
            <div class="smaller-div">
                <div class="title">
<h2>Nombre total de documents sur le site</h2>
<h3 class="center">4404</h3>
                </div>
            </div>
            <div class="smaller-div">
            <div class="title">
<h2>Sujet le plus recherché dans l'ensemble</h2>
<h3 class="center">4404</h3>
                </div>
            </div>
        </div>
        <!-- <div class="Home-info center">
            <h1>Documents les plus recents</h1>
        </div> -->
    </div>
    <div class="home-container grid2">
        <div class="small-div">
            <div class="title">
                <h2>THE TITLE</h2>
            </div>
            <div class="content">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum ducimus reiciendis magnam distinctio consequuntur maiores temporibus officia asperiores ratione, ex et doloribus vel animi. Cupiditate vitae sint, aspernatur quidem temporibus esse illum nostrum amet voluptate? Provident ea tenetur fugit aliquam sapiente unde aperiam, excepturi voluptates cum animi molestiae id accusantium nemo magni possimus eaque quae quod neque sequi hic dolores!</p>
            </div>
        </div>
        <div class="small-div">
            <div class="title">
                <h2>THE TITLE</h2>
            </div>
            <div class="content">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum ducimus reiciendis magnam distinctio consequuntur maiores temporibus officia asperiores ratione, ex et doloribus vel animi. Cupiditate vitae sint, aspernatur quidem temporibus esse illum nostrum amet voluptate? Provident ea tenetur fugit aliquam sapiente unde aperiam, excepturi voluptates cum animi molestiae id accusantium nemo magni possimus eaque quae quod neque sequi hic dolores!</p>
            </div>
        </div>
        <div class="small-div">
            <div class="title">
                <h2>THE TITLE</h2>
            </div>
            <div class="content">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum ducimus reiciendis magnam distinctio consequuntur maiores temporibus officia asperiores ratione, ex et doloribus vel animi. Cupiditate vitae sint, aspernatur quidem temporibus esse illum nostrum amet voluptate? Provident ea tenetur fugit aliquam sapiente unde aperiam, excepturi voluptates cum animi molestiae id accusantium nemo magni possimus eaque quae quod neque sequi hic dolores!</p>
            </div>
        </div>
        <div class="small-div">
            <div class="title">
                <h2>THE TITLE</h2>
            </div>
            <div class="content">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum ducimus reiciendis magnam distinctio consequuntur maiores temporibus officia asperiores ratione, ex et doloribus vel animi. Cupiditate vitae sint, aspernatur quidem temporibus esse illum nostrum amet voluptate? Provident ea tenetur fugit aliquam sapiente unde aperiam, excepturi voluptates cum animi molestiae id accusantium nemo magni possimus eaque quae quod neque sequi hic dolores!</p>
            </div>
        </div>
    </div>
</div>
@endsection
