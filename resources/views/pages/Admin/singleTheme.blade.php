<?php

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;


//  $doc1=public_path("uploads\\themes");
$doc1=public_path("uploads\\themes\\$theme->theme\\attestation\\$attestation->doc_path");
 $val= strval($doc1);
//  $doc1 = $attestation->doc_path;
$doc2=Storage::get(public_path('lol.txt'))

?>
@extends('layouts.admin')
@section('right-section')
<!-- <a href="{{route('viewDoc', ['theme' => $theme->id,'doc'=>$val])}}" target="_blank">View Attestation</a>
<p>{{$doc1}}</p> -->

<div class="embed-div">
    <h1>Attestation</h1>
    <embed src="{{ asset("uploads/themes/$theme->theme/attestation/$attestation->doc_path") }}" type="application/pdf" width="100%" height="500px" />
    @if($attestation->verified_by != null)
    <p>Ce document a été marqué comme <b><u>{{$attestation->isValid==0?'Non Conforme':'Conforme'}}</u></b> par {{$attestation->verified_by}}</p>
    @else
    <div class="admin-decide">
        <li><b>Confirmez-vous la validité et l'authenticité de ce document ?</b></li>
        <div class="flexArn">
            <form method="POST" action="{{route('admin.accept_attestation',['theme'=>$theme->id,'id'=>$attestation->id])}}" class="admin-form succeed" style="border-left:11px solid #8eeb8e">
            @csrf
                <button>Oui, je confirme</button>
                <p>- Confirmer que le document est une attestation</p>
                <p>- Confirmer que le document est une attestation</p>
                <p>- Confirmer que le document est une attestation</p>
                <p>- Confirmer que le document est une attestation</p>
                <p>- Confirmer que le document est une attestation</p>
            </form>
            <form method="POST" action="{{$theme->id}}/attestation/{{$attestation->id}}/denie" class="admin-form denail" style="border-left:11px solid red">
            @csrf
                <button class="error">Non, je refuse</button>
                <p>Specifier la raison (clair et précis)</p>
                <textarea name="attestation_error" id="" cols="50" rows="5" required placeholder="ex : Le document n'est pas une attestation"></textarea>
            </form>
        </div>
    </div>
    @endif

</div>
<div class="embed-div">
    <h1>Memoire</h1>
    <embed src="{{ asset("uploads/themes/$theme->theme/memoire/$memoire->doc_path") }}" type="application/pdf" width="100%" height="500px" />
    @if($memoire->verified_by != null)
    <p>Ce document a été marqué comme <b><u>{{$memoire->isValid==0?'Non Conforme':'Conforme'}}</u></b> par {{$memoire->verified_by}}</p>
    @else
    <div class="admin-decide">
        <li><b>Confirmez-vous la validité et l'authenticité de ce document ?</b></li>
        <div class="flexArn">
            <form method="POST" action="{{route('admin.accept_memoire',['theme'=>$theme->id,'id'=>$memoire->id])}}" class="admin-form succeed" style="border-left:11px solid #8eeb8e">
            @csrf
                <button>Oui, je confirme</button>
                <p>- Confirmer que le document est une attestation</p>
                <p>- Confirmer que le document est une attestation</p>
                <p>- Confirmer que le document est une attestation</p>
                <p>- Confirmer que le document est une attestation</p>
                <p>- Confirmer que le document est une attestation</p>
            </form>
            <form method="POST" action="{{$theme->id}}/memoire/{{$memoire->id}}/denie" class="admin-form denail" style="border-left:11px solid red">
            @csrf
                <button class="error">Non, je ne refuse</button>
                <p>Specifier la raison (clair et précis)</p>
                <textarea name="memoire_error" id="" cols="50" rows="5" required placeholder="ex : Le document n'est pas une Memoire"></textarea>
            </form>
        </div>

    </div>
    @endif
</div>
@endsection
