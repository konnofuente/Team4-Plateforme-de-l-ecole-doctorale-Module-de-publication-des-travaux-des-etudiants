@extends('layouts.admin.body')
@section('content')
    @include('layouts.admin.sidebarEcoleDoctorat')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Liste de Themes</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('Admin.index') }}">Admin</a></li>
                    <li class="breadcrumb-item">Ecole Doctorat</li>
                    <li class="breadcrumb-item active">Dossier</li>
                </ol>
            </nav>
        </div>
        <section class="section">

            <div class="card">
                <div class="card-body">
                    <h1 class="card-title text-center text-capitalize" style="font-size: 40px">Liste de Themes</h1>

                    <!-- Horizontal Form -->
                    <!-- End Horizontal Form -->

                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <br><br>
                    <div class="row ">
                        <div class="col-md-7 ">
          <!-- The code goes here---->
                        </div>

                        <div class="search-barss col-md-5 row">
                            <br>
                            {{-- <div class="col-12">

                            </div> --}}
                            <div class="col-12">
                                <button type="button" class="btn btn-info text-light" data-bs-toggle="modal"
                                    data-bs-target="#formNewsModal"> News</button>
                            </div>

                        </div>
                    </div>

                        <br>
                        @if($unchecked_projects->count() > 0)
                        <table class="table table-hover text-center">
                            <p>Themes Pas encore Verifier</p>
                            @foreach ($unchecked_projects as $project)
                                <p>{{$project->theme}}</p>
                            @endforeach
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Matricule Du Chef</th>
                                    <th scope="col">Theme</th>
                                    <th scope="col">Encadreur</th>
                                    <th scope="col">Année</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody id="tbodys">
                                @foreach ($unchecked_projects as $project)
                                <tr>
                                    <td>{{ $project->id }}</td>
                                    <td>{{$project->chef_matricule}}</td>
                                    <td>{{$project->theme}}</td>
                                    <td>{{$project->encadreur_email}}</td>
                                    <td><?php echo(date('Y', strtotime($project->created_at)))?></td>
                                    <td>
                                            <a class="btn btn-success" href="{{ route('Ecole_Doctorat.dossier.voir', $project->id) }}">
                                            <i class="fa-solid fa-folder-open"></i>Voir plus</a> 
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            </table>
                            @else
                            <p>Pas de themes non-varifier pour l'instant</p>

                            @endif

                            @if($checked_valid->count() > 0)
                            <table class="table table-hover text-center">
                            <p>Themes Deja verifier et Valide</p>
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Matricule Du Chef</th>
                                    <th scope="col">Theme</th>
                                    <th scope="col">Encadreur</th>
                                    <th scope="col">code</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody id="tbodys">
                            @foreach($checked_valid as $project)
                                <tr>
                                    <td>{{$project->id}}</td>
                                    <td>{{$project->chef_matricule}}</td>
                                    <td>{{$project->theme}}</td>
                                    <td>{{$project->encadreur_email}}</td>
                                    <td>{{$project->verification_code}}</td>
                                    <td>ACTIONS HERE</td>
                                </tr>
                                @endforeach
                            </tbody>
                            </table>
                            @else
                                <p>Pas de themes deja valider pour linstant</p>
                            @endif

                            @if($checked_unvalid->count() > 0)
                            <table class="table table-hover text-center">
                            <p>Themes Non valide</p>
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Matricule Du Chef</th>
                                    <th scope="col">Theme</th>
                                    <th scope="col">Encadreur</th>
                                    <th scope="col">Année</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody id="tbodys">
                            @foreach($checked_unvalid as $project)
                                <tr>
                                    <td>{{$project->id}}</td>
                                    <td>{{$project->chef_matricule}}</td>
                                    <td>{{$project->theme}}</td>
                                    <td>{{$project->encadreur_email}}</td>
                                    <td>{{$project->created_at}}</td>
                                    <td>ACTIONS HERE</td>
                                </tr>
                                @endforeach
                            </tbody>
                            </table>
                            @else
                                <p>Pas de themes refuser pour l'instant</p>
                            @endif

                <!-- End Dark Table -->

            </div>
            </div>
        </section>

    </main>
    @endsection
@section('modals')
    @include('layouts.modals.dossierjury')
    @include('layouts.modals.dossierNew')
@endsection
@section('scripts')
    <script src="{{ asset('js/ecoleDoctorat/dossier.js') }}"></script>
@endsection
