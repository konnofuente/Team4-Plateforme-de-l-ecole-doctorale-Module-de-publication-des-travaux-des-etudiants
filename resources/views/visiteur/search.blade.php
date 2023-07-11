@extends('layouts.visitor.body')
@section('content')
<div>
    <form method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group" style="padding:20px 0px;">
        <button type="submit" class="btn btn-primary">Soummetre</button>
    </div>
    </form>
</div>
@endsection
