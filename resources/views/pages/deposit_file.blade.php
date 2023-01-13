
@extends('layouts.default')

@section('content')
<div class="content">
            <h2 class="heading center">Salut, Bien vouloir creer un compte</h2>
            <div class="form-container">
                <form action="">
                    <div class="grid2">
                        <div>
                        <h1>les membres du groupe</h1>
                        <div class="student-group grid2">
                            <div class="single-student">
                                <h3>étudiant 1 (Group Chef)</h3>
                                <label for="nom2">Nom :</label>
                                <input type="text" id="nom1" name="etu1Nom">

                                <label for="mat">Matricule :</label>
                                <input type="text" name="etu1Mat">

                                <label for="email">Email</label>
                                <input type="email" name="etud1Mail" id="email">
                            </div>
                            <div class="single-student">
                                <h3>étudiant 2</h3>
                                <label for="nom2">Nom :</label>
                                <input type="text" id="nom2" name="etu2Nom">

                                <label for="mat2">Matricule :</label>
                                <input type="text" name="etu2Mat" id="mat2">

                                <label for="email">Email</label>
                                <input type="email" name="etud2Mail" id="email">
                            </div>
                            <div class="single-student">
                                <h3>étudiant 3</h3>
                                <label for="nom">Nom :</label>
                                <input type="text" id="nom3" name="etu3Nom">

                                <label for="mat">Matricule :</label>
                                <input type="text" name="etu3Mat">

                                <label for="email">Email</label>
                                <input type="email" name="etud3Mail" id="email">
                            </div>
                        </div>

                        </div>
                        <div>
                        <h1>Nom des ancadreurs</h1>
                            <div class="grid2">
                            <div class="single-student">
                                <h3>Ancadreurs Professionelle</h3>
                                <label for="nom2">Nom :</label>
                                <input type="text" id="nom1" name="etu1Nom">

                                <label for="mat">Matricule :</label>
                                <input type="text" name="etu1Mat">
                            </div>
                            <div class="single-student">
                                <h3>encadreurs financielle</h3>
                                <label for="encadreurProNom">Nom :</label>
                                <input type="text" id="nom2" name="encadreurPro">

                                <label for="mat2">contact :</label>
                                <input type="number" name="encadreurFinCon" id="mat2">
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="center spaced">
                        <button>Submit Information</button>
                    </div>

                </form>
            </div>


            <div class="form-container">
                <form action="{{ route('file.store') }}" enctype="multipart/form-data" method="POST">
                    <div>
                        <h2>Plus de détails requis</h2>
                        <label for="speciality">specialite</label>
                        <select name="specialite" id="speciality">
                            <option value="opt1">opt1</option>
                            <option value="opt2">opt2</option>
                            <option value="opt3">opt3</option>
                            <option value="opt4">opt4</option>
                            <option value="opt5">opt5</option>
                            <option value="opt6">opt6</option>
                            <option value="opt7">opt7</option>
                        </select>

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
                    </div>
                    <div class="center spaced">
                        <button type="submit"
                        >Submit Thesis</button>
                    </div>

                </form>
            </div>
        </div>
@stop
