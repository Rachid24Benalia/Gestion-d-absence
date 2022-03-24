

@extends('absence.layout')
@section('content')
        <form action="{{route('seances.search')}}" class="barre">
            <div class="row recherche">
           
                <div class="col-md-4">
                    <label>Niveau:</label></br>
                    <select name="niveau" class="form-select">
                        <option value="api1">API1</option>
                        <option value="api2">API2</option>
                        <option value="ci1">CI1</option>
                        <option value="ci2">CI2</option>
                        <option value="ci3">CI3</option>
                    </select>
                </div>
                <div class="col-md-4">
                <label>filiére:</label></br>
                    <select name="filiere" class="form-select">
                        <option value="api">API</option>
                        <option value="iagi" selected>IAGI</option>
                        <option value="gem">GEM</option>
                        <option value="gi">GI</option>
                        <option value="msei">MSEI</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label>Section:</label></br>
                    <select class="form-select" name="section">
                        <option value="sectionA">section A</option>
                        <option value="sectionB" selected>section B</option>
                        <option value="sectionC">section C </option>
                        <option value="cycle">cycle ingénieur</option>
                    </select> 
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4"></div>
                <div class="col-md-4">
                <button type="submit" class="find"><i class="fa fa-search" aria-hidden="true"></i>
                 rechercher</button>
                </div>
            </div>
        </form>
        <div class="row">
            <div class="col-md-12">
                <div class="card  absent">
                    <div class="card-header">etudiants</div>
                    <div class="card-body">
                        <div class="table-responsive">            
                            <table class="table">
                                <thead>
                                    <tr>
                                    <th>cne</th>
                                        <th>nom</th>
                                        <th>prenom</th>
                                        <th>niveau</th>
                                        <th>filière</th>
                                        <th>section</th>
                                        <th >Présent/Absent</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if(isset($etudiants))
                                    @foreach($etudiants as $etudiant)
                                    <form method="POST" action="{{ url('absence') }}">
                                    {{ csrf_field() }}

                                        <tr>
                                        <td>{{ $etudiant->cne }}</td>
                                            <td>{{ $etudiant->nom }}</td>
                                            <td>{{ $etudiant->prenom}}</td>
                                            <td>{{ $etudiant->niveau}}</td>
                                            <td>{{ $etudiant->filiere }}</td>
                                            <td>{{ $etudiant->section }}</td>                                 
                                            <td>
                                                    <input type="radio" name={{ $etudiant->id}} value="1" checked>Present
                                                    <input type="radio" name={{ $etudiant->id }} value="0">Absent
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif               
                                </tbody>
                            </table>

                            <button type="submit" class="envoyer">Envoyer</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>

@endsection