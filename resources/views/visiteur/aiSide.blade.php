@extends('layouts.visitor.body')
@section('content')

<div>
    <h1 class="text-primary" align="center">AI Side - AI Text Analysis</h1>

    <form method="POST" action="{{ route('visiteur.aiSearchMemoire') }}">
        @csrf
        <div class="form-row">
            <div class="form-group">
                <label for="memoireId">Memoire ID</label>
                <input type="text" class="form-control" id="memoireId" placeholder="Enter the Memoire ID" name="projId">
            </div>
            <div class="form-group" style="padding:20px 0px;">
                <button type="submit" class="btn btn-primary">Search Memoire</button>
            </div>
        </div>
    </form>

    @if (isset($error))
        <div class="alert alert-danger mt-3">
            {{ $error }}
        </div>
    @endif

    @if (isset($projectInfo))
        <div class="project-info mt-3">
            <h2>Project Information</h2>
            <p><strong>Theme:</strong> {{ $projectInfo['theme'] }}</p>
            <p><strong>Abstract:</strong> {{ $projectInfo['abstract'] }}</p>
            <p><strong>Language:</strong> {{ $projectInfo['language'] }}</p>
            <div class="mt-4">
                <h2>Extracted Text from Memoire</h2>
                <pre>{!! $pdfText !!}</pre>
            </div>
            <div class="mt-4">
                <h2>summary</h2>
                <pre>{!! $summary !!}</pre>
            </div>
            {{-- <p><strong>Extracted Text:</strong>{{  $pdfText }}</p> --}}
            <!-- Display other project information as needed -->
        </div>

        <h2>AI Analysis</h2>
        <div>
            <form method="POST" action="{{ route('visiteur.aiAnalysis') }}">
                @csrf
                {{-- <input type="hidden" name="projId" value="{{ $projectInfo['id'] }}"> --}}
                <div class="form-row">
                    <div class="form-group">
                        <label for="resumeLang">Select Language:</label>
                        <select class="form-control" id="resumeLang" name="resumeLang">
                            <option value="fr">French</option>
                            <option value="en">English</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="prompt">Enter Prompt:</label>
                        <textarea class="form-control" id="prompt" name="prompt" rows="4" placeholder="Enter your prompt here"></textarea>
                    </div>
                    <div class="form-group" style="padding:20px 0px;">
                        <button type="submit" class="btn btn-primary">Analyze</button>
                    </div>
                </div>
            </form>
        </div>
    @endif
</div>
@endsection

















{{-- @extends('layouts.visitor.body')
@section('content')

<div>
    <h1 class="text-primary" align="center">AI Side - AI Text Analysis</h1>

    <form method="POST" action="{{ route('visiteur.aiSearchMemoire') }}">
        @csrf
        <div class="form-row">
            <div class="form-group">
                <label for="memoireId">Memoire ID</label>
                <input type="text" class="form-control" id="memoireId" placeholder="Enter the Memoire ID" name="projId">
            </div>
            <div class="form-group" style="padding:20px 0px;">
                <button type="submit" class="btn btn-primary">Search Memoire</button>
            </div>
        </div>
    </form></div>
    </form>

  @if(isset($selectedProject))
    <div class="mt-4">
        <h2>Thesis Information</h2>
        <p>Thesis Title: {{ $selectedProject->title }}</p>
        <p>Authors: {{ $selectedProject->authors }}</p>
        <p>Supervisor: {{ $selectedProject->supervisor }}</p>
        <!-- Add more relevant information about the thesis as needed -->

        <h2>Abstract</h2>
        <p>{{ $selectedProject->abstract }}</p> 

        @if (isset($projectInfo))
        <div class="project-info">
            <h2>Project Information</h2>
            <p><strong>Theme:</strong> {{ $projectInfo['theme'] }}</p>
            <p><strong>Abstract:</strong> {{ $projectInfo['abstract'] }}</p>
            <p><strong>Language:</strong> {{ $projectInfo['language'] }}</p>
            <!-- Display other project information as needed -->
        </div>
      

        <h2>AI Analysis</h2>
        <div>
            {{-- <form method="POST" action="{{ route('visiteur.aiAnalysis') }}"> 
            <form method="POST" action="#">
                <input type="hidden" name="projId" value="{{ $projectInfo['id'] }}">
                <div class="form-row">
                    <div class="form-group">
                        <label for="resumeLang">Select Language:</label>
                        <select class="form-control" id="resumeLang" name="resumeLang">
                            <option value="fr">French</option>
                            <option value="en">English</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="prompt">Enter Prompt:</label>
                        <textarea class="form-control" id="prompt" name="prompt" rows="4" placeholder="Enter your prompt here"></textarea>
                    </div>
                    <div class="form-group" style="padding:20px 0px;">
                        <button type="submit" class="btn btn-primary">Analyze</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @endif

</div>
@endsection --}}
