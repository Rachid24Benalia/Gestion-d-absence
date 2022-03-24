@extends('absence.layout')
@section('content')
      <div class="card">
          <div class="card-header">Ajouter une seance</div>
          <div class="card-body">
              <form action="{{ url('seance') }}" method="post">
                {!! csrf_field() !!}
                <label>Date seance:</label></br>
                <input type="date" name="date_seance"  class="form-control">
                <label>Intitule Module:</label></br>
                <input type="text" name="intitule" id="address" class="form-control">
                <label>Type de Seance:</label></br>
                <select name="type_seance" class="form-select">
                      <option value="cours">Cours</option>
                      <option value="td" selected>TD</option>
                      <option value="tp">TP</option>
                </select>

                <label>Niveau:</label></br>
                <select name="niveau" class="form-select">
                    <option value="api1">API1</option>
                    <option value="api2" selected>API2</option>
                    <option value="ci1">CI1</option>
                    <option value="ci2">CI2</option>
                    <option value="ci3">CI3</option>
                </select>

               <label>filiére:</label></br>
                <select name="filiere" class="form-select">
                    <option value="api">API</option>
                    <option value="iagi" selected>IAGI</option>
                    <option value="gem">GEM</option>
                    <option value="gi">GI</option>
                    <option value="msei">MSEI</option>
                </select>
                
                
                <label>Section:</label></br>
                <select class="form-select" name="section">
                      <option value="sectionA">section A</option>
                      <option value="sectionB" selected>section B</option>
                      <option value="sectionC">section C </option>
                      <option value="cycle">cycle ingénieur</option>
                </select>        
                <input type="submit" value="Ajouter" class="enregister"></br>
            </form>
      </div>

@endsection