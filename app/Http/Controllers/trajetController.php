<?php

namespace App\Http\Controllers;


use Carbon\Carbon;
use App\Models\Gar;
use App\Models\Classe;
use App\Models\Trajet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class trajetController extends Controller
{

    public function reserve()
    {
        return view('reservation');
    }
    public function formReserve()
    {
        $listetrajet = Gar::all();
        $listeclasse = Classe::all();
        return view('reservation',["trajet"=>$listetrajet,"listeclasse"=>$listeclasse]);
    }
    public function showTrajet()
    {
        $listetrajet=Trajet::all();
       return view('listeTrajet',["trajet"=>$listetrajet]);
    }

    public function trajet()
    {
        return view('listeTrajet');
    }

    public function pajoutTrajet()
    {
        return view('ajoutTrajet');
    }


    public function addTrajet(Request $request)
    {
        $request->validate([
            'gareDepart'=>'required',
            'gareAriver'=> 'required',
            'dateDepart'=> 'required',
            'tarif'=> 'required',
        ]);
        Trajet::create($request->all());
        return redirect('/listeTrajet')->with('success','Ajouter avec succes');
    }










}
