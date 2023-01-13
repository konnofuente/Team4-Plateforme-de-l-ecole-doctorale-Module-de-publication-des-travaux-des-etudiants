@foreach ($file as $file)
<h2>Content Find in File:</h2>
{{ $file->orig_filename }}
<h3>Content of file:</h3>
{{-- <a href="{{ url('highlighted') }}">{{ $file->orig_filename }}</a> --}}
<div class="form-group">
    <textarea class="form-control rounded-0" id="exampleFormControlTextarea1" rows="10">
        {{ $file->content }}
    </textarea>
  </div>

<hr>
@endforeach