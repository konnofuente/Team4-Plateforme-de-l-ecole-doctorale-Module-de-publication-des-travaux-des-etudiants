@extends('layouts.default')
@section('right-section')
<div class="submit-div-container">
    <div class="submit-form-container">
        <form class="grid2" method="POST">
            @csrf
            <div class="inputSection ">
                <h3>Etudiant 1 (Chef)</h3>
                <div class="grid2">
                <div>
                    <label for=""></label>
                    <input type="text" placeholder="Nom" name="auth1">
                </div>
                <div>
                    <label for=""></label>
                    <input type="text" placeholder="Matricule" name="mat1">
                </div>
                <div>
                    <label for=""></label>
                    <input type="text" placeholder="Email">
                </div>
                </div>

            </div>
            <div class="inputSection ">
                <h3>Etudiant 2</h3>
                <div class="grid2">
                <div>
                    <label for=""></label>
                    <input type="text" placeholder="Nom" name="auth2">
                </div>
                <div>
                    <label for=""></label>
                    <input type="text" placeholder="Matricule" name="mat2">
                </div>
                <div>
                    <label for=""></label>
                    <input type="text" placeholder="Email">
                </div>
                </div>

            </div>
            <div class="inputSection ">
                <h3>Etudiant 3</h3>
                <div class="grid2">
                <div>
                    <label for=""></label>
                    <input type="text" placeholder="Nom" name="auth3">
                </div>
                <div>
                    <label for=""></label>
                    <input type="text" placeholder="Matricule" name="mat3">
                </div>
                <div>
                    <label for=""></label>
                    <input type="text" placeholder="Email">
                </div>
                </div>

            </div>
            <div>

            </div>
            <div class="inputSection ">
                <h3>Encadreur 1 (Academique)</h3>
                <div class="grid2">
                <div>
                    <label for=""></label>
                    <input type="text" placeholder="Nom" name="cord1">
                </div>
                <div>
                    <label for=""></label>
                    <input type="text" placeholder="Email">
                </div>
                <div>
                    <label for=""></label>
                    <input type="text" placeholder="Telephone">
                </div>
                </div>

            </div>
            <div class="inputSection ">
                <h3>Encadreur 2 (Financiere)</h3>
                <div class="grid2">
                <div>
                    <label for=""></label>
                    <input type="text" placeholder="Nom" name="cord2">
                </div>
                <div>
                    <label for=""></label>
                    <input type="text" placeholder="Email">
                </div>
                <div>
                    <label for=""></label>
                    <input type="text" placeholder="Telephone">
                </div>
                </div>
            </div>
            <div class="Theme-Projet inputSection">
                <label for="">Theme:</label>
                <input type="text" placeholder="Theme du Projet">
            </div>
            <div class="Specialiter inputSection">
                <label for="">Specialiter:</label>
                <input type="text" placeholder="Specialiter">
            </div>
            <div class="docsSection">
                <div class="">
                    <label for="doc1">Rapport</label>
                    <input id="doc1" type="file" name="file">
                </div>
                <!-- <div>
                    <label for="doc2">Attestaion de soutenance</label>
                    <input id="doc2" type="file">
                </div> -->

                <!-- <div>
                    <label for="doc3">Rapport</label>
                    <input id="doc3" type="file" required>
                </div> -->


            </div>
            <button>SOUMMETRE</button>
        </form>
    </div>
</div>
    <!-- <h1>Enregistrer Votre groupe et votre putain de document 😒</h1> -->
@endsection
