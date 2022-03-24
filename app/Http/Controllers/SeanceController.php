<?php

namespace App\Http\Controllers;

use App\Seance;
use Illuminate\Http\Request;

class SeanceController extends Controller
{

        //retourna la page de gerer les seances ,la liste des seances d'un professeur
    public function index()
    {
        $seances=seance::all();
        return view('absence.index',compact('seances'));
    }
    
    //afin d'ajouter une nouvelle seance on retourne le formulaire
    public function create()
    {
        return view('absence.create');
    }

    //afin de stocker une nouvelle seance
    public function store(Request $request)
    {
        $request->validate([
            'date_seance'=>'required',
            'type_seance'=>'required',
            'intitule'=>'required',
            'niveau'=>'required',
            'filiere'=>'required',
            'section'=>'required',
        ]);
        Seance::create($request->all());
        return redirect('/seance')
        ->with('success','la sance est ajoutée avec succés');
    }   
}
