@if (Session::has('success'))
{{ session()->get('success') }}
<br><br>
@endif

@extends('layouts.default')
@section('content')
<h2 class="heading center">Salut, Bien vouloir creer un compte</h2>

<div class="py-12">
    <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
        <div class="form-container">
            <div class="p-6 bg-white border-b border-gray-200">
                <form action="{{ route('file.store') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="grid2">
                        <div>
                        <h1>les membres du groupe</h1>
                        <div class="student-group grid2">
                            <div class="single-student">
                                <h3>étudiant 1 (Group Chef)</h3>
                                <label for="nom2">Nom :</label>
                                <input type="text" id="nom1" name="auth1">
            
                                <label for="mat">Matricule :</label>
                                <input type="text" name="mat1">
            
                               
                            </div>
                            <div class="single-student">
                                <h3>étudiant 2</h3>
                                <label for="nom2">Nom :</label>
                                <input type="text" id="nom2" name="auth2">
            
                                <label for="mat2">Matricule :</label>
                                <input type="text" name="mat2" id="mat2">
            
                               
                            </div>
                            <div class="single-student">
                                <h3>étudiant 3</h3>
                                <label for="nom">Nom :</label>
                                <input type="text" id="nom3" name="auth3">
            
                                <label for="mat">Matricule :</label>
                                <input type="text" name="mat3">
            
                              
                            </div>
                        </div>
            
                        </div>
                        <div>
                        <h1>Nom des ancadreurs</h1>
                            <div class="grid2">
                            <div class="single-student">
                                <h3>Ancadreurs Professionelle</h3>
                                <label for="nom2">Nom :</label>
                                <input type="text" id="nom1" name="cord1">
            
                               
                            </div>
                            <div class="single-student">
                                <h3>encadreurs financielle</h3>
                                <label for="encadreurProNom">Nom :</label>
                                <input type="text" id="nom2" name="cord2">
            
                                
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-2"> <span>Attachments</span>
                        <div
                            class="relative h-40 rounded-lg border-dashed border-2 border-gray-200 bg-white flex justify-center items-center hover:cursor-pointer">
                            <div class="absolute">
                                <div class="flex flex-col items-center "> <i
                                        class="fa fa-cloud-upload fa-3x text-gray-200"></i>
                                    <span class="block text-gray-400 font-normal">Attach
                                        you files here</span> <span class="block text-gray-400 font-normal">or</span>
                                    <span class="block text-blue-400 font-normal">Browse
                                        files</span>
                                </div>
                            </div>
                            <input type="file" class="h-full w-full opacity-0" name="file">
                        </div>
                    </div>
                    <div class="mt-3 text-center pb-3">
                        {{-- <button type="submit"
                            class="w-full h-12 text-lg w-32 bg-blue-600 rounded text-white hover:bg-blue-700">
                            Save
                        </button> --}}
                        <div class="center spaced">
                            <button
                            type="submit"
                            >Submit Thesis</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection