<?php

namespace App\Http\Controllers;

use App\Etudiant;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    public function index()
    {
        return view('absence.appel');
    }
    public function create()
    {
        return view('absence.create');
    }

   
    public function search() {
        $filiere=request()->input('filiere');
        $niveau=request()->input('niveau');
        $section=request()->input('section');
        $date=request()->input('date_seance');
        $etudiants=Etudiant::where('filiere','like',"%$filiere%")
        ->where('niveau','like',"%$niveau%")
        ->where('section','like',"%$section%")
        ->paginate(5);
        return view('absence.appel',compact('etudiants'))
        ->with('i',(request()->input('page',1) -1)*5);
    }

    
}
