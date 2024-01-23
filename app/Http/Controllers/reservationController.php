<?php

namespace App\Http\Controllers;


use Carbon\Carbon;
use App\Models\Gar;
use App\Models\Reservation;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\DB;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class reservationController extends Controller
{


/*
    public function priceTer()
    {

        $Tarif=0;
        if (Request::$request->input('gareD') != Request::$request->input('gareA')) {
            $A = Gar::All()->WHERE('id', Request::$request->input('gareD'));
            $B = Gar::All()->WHERE('id', Request::$request->input('gareA'));
            foreach ($A as $A1) foreach ($B as $B1) {
                if ($A1['Categorie'] == "zone 1" and $B1['Categorie'] == "zone 1") {
                    $Tarif = (500 * Request::$request->input('billet'));
                } elseif (($A1['Categorie'] == "zone 2" and $B1['Categorie'] == "zone 2")) {
                    $Tarif = (1000 * Request::$request->input('billet'));
                } else {
                    $Tarif = (1500 * Request::$request->input('billet'));
                }
            }
            return $Tarif;
        }
        else {
            return back();
        }
    }
    public function prix()
    {
        return $this->priceTer();
    }
*/


    public function generateQRCode()
    {
       // $tarif=$this->prix();
        // Contenu que vous souhaitez encoder dans le code QR
        $donne = DB::table('reservations')->first();
            if ($donne) {
                $Tarif = $donne->tarif;
                // Utiliser les champs de la table dans le contenu du code QR
                $content = 'Votre Ticket de ' . $donne->gareD . ' a ' . $donne->gareA .
                    ' Du ' . $donne->dateReservation . ' Classe ' . $donne->classeP.' votre prix est: '.$Tarif.
                    // Récupérer la date de génération depuis la base de données
                    $dateReservation = Carbon::parse($donne->dateReservation);
                // Vérifier si le code QR est toujours valide (3 jours de validité)
                $dateExpiration = $dateReservation->addDays(2);
                $maintenant = now();
                $qrCode = QrCode::size(300)->generate($content);
                if ($maintenant->lte($dateExpiration)) {
                    // Affichage du code QR avec les données de la table
                    // Retourner le tableau de billets générés
                    return view('qrcode', compact('qrCode'));
                } else {
                    return view('code_qr_expire');
                }
            } else {
                // Gérer le cas où aucune donnée n'est trouvée
                return view('aucune_donnee_trouvee');
            }
    }




    public function faireReservation(Request $request)
    {//Permet de faire une reservation
        $Tarif = 0;
        // Enregistrez la réservation dans la base de données
        $request->validate([
            'gareD' => 'required',
            'gareA' => 'required',
            'dateReservation' => 'required',
            'classeP' => 'required',
            'billet' => 'required',
          ]);
        if ($request->input('gareD') != $request->input('gareA')) {
            $A = Gar::All()->WHERE('id',$request->input('gareD'));
            $B = Gar::All()->WHERE('id',$request->input('gareA'));
            foreach($A as $A1) {
            foreach($B as $B1) {
            if ($A1['Categorie'] == "zone 1" AND $B1['Categorie'] == "zone 1") {
                $Tarif = (500*$request->input('billet'));
            }elseif (($A1['Categorie'] == "zone 2" AND $B1['Categorie'] == "zone 2")){
                $Tarif = (1000*$request->input('billet'));
            }else{
                $Tarif = (1500*$request->input('billet'));
            }
            }
            }
            $reservation = new Reservation([
                'gareD' => $request->input('gareD'),
                'gareA' => $request->input('gareA'),
                'dateReservation'=>$request->input('dateReservation'),
                'classeP'=>$request->input('classeP'),
                'billet'=>$request->input('billet'),
                'tarif'=>$Tarif,
            ]);
            $reservation->save();
            // Générez un code QR pour les tickets
            $codeQr = QrCode::size(200)->generate($reservation->id);
            // Retournez la réponse avec le code QR
            return $this->generateQRCode();
        }else {
            return back();
        }
    }



}
