<?php

namespace App\Http\Controllers;

use App\Absence;
use App\Seance;
use App\Etudiant;

use Illuminate\Http\Request;

class AbsenceController extends Controller
{
    public function index()
    {
        //on recupere les enregistrements ou il y'a des absences
        $absences=Absence::where('present','=',0)
        ->paginate(5);  
        return view('absence.liste',compact('absences'))
        ->with('i',(request()->input('page',1) -1)*5);
    }
    
    public function store(Request $request)
    {
        $date = date('Y-m-d');
        $seances=Seance::where('date_seance','=',"$date")
        ->where('filiere','like',"%iagi%")
        ->first()->get();
        dd($seances);
        foreach($request->all() as $cle=>$value) {
            if($cle=="_token") {
            }else {
                Absence::create([
                    'present'     => $value,
                    'etudiant_id'      => $cle,
                    'seance_id'         => $seances[0]->id,
                ]);
            }
         
        }
       
    
    }
    public function searchByCne() {
       $x=request()->input('cne');
       //on recupere les cne des etudiants 
       $etudiants=Etudiant::where('cne','like',"%$x%")
       ->paginate(5);  
       $absences=array();
       foreach(absence::all() as $item) {
          if($item->etudiant->cne == request()->input('cne') && $item->present==0) {
               array_push($absences,$item);
          }
       }
       return view('absence.liste',compact('absences'))
       ->with('i',(request()->input('page',1) -1)*5);

    }

    public function searchByDate() {
        $x=request()->input('date_seance');
//on recupere la liste des absences ,ensuite on cherche si la date de l'absence correspond à celle cherhce
$absences=array();       
    foreach(absence::all() as $item) {
        if($item->seance->date_seance == $x && $item->present==0) {
            array_push($absences,$item);
        }
    }
    return view('absence.liste',compact('absences'))
       ->with('i',(request()->input('page',1) -1)*5);
    }
    
}
