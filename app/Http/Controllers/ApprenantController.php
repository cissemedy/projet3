<?php

namespace App\Http\Controllers;

//use App\Models\apprenant;
use Illuminate\Http\Request;
use App\Models\Apprenant;
use Illuminate\View\View;

class ApprenantController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function index_apprenant(){
        return view("apprenants.index");
     }

     public function detail_apprenant(string $id):View
     {
         $apprenants = Apprenant::find($id);
         return view('apprenants.detail')->with('apprenants', $apprenants);
     }
 

    public function liste_apprenant()
    {
        $apprenants = Apprenant::paginate(5);
        return view("apprenants.liste", compact('apprenants'));
    }

    public function ajouter_apprenant()
    {
        return view("apprenants.ajouter");
    }
    
    

    public function ajouter_apprenant_traitement(Request $request)
    {
       
        $request->validate([
            'matricule' => ['required','integer'],
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required',
            'date_naissance' => 'required',
            'telephone' => 'required',
            'adresse' => 'required',
            'universite_id' => 'required',
        ]);

        
        $apprenant = new Apprenant();

        
        $apprenant->matricule = $request->matricule;
        $apprenant->nom = $request->nom;
        $apprenant->prenom = $request->prenom;
        $apprenant->email = $request->email;
        $apprenant->date_naissance = $request->date_naissance;
        $apprenant->telephone = $request->telephone;
        $apprenant->adresse = $request->adresse;
        $apprenant->universite_id = $request->universite_id;
        $apprenant->save();

        
        return redirect('/ajouter')->with('status', 'L\'apprenant a été enregistré avec succès.');
    }

    public function modifier_apprenant($id)
    {
        $apprenants = Apprenant::find($id);
        return view('apprenants.modifier', compact('apprenants'));
    }

    public function modifier_apprenant_traitement(Request $request)
    {
        $request->validate([
            'matricule' => ['required','integer'],
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required',
            'date_naissance' => 'required',
            'telephone' => 'required',
            'adresse' => 'required',
            'universite_id' => 'required',
        ]);

        $apprenant = Apprenant::find($request->id);

        
        $apprenant->matricule = $request->matricule;
        $apprenant->nom = $request->nom;
        $apprenant->prenom = $request->prenom;
        $apprenant->email = $request->email;
        $apprenant->date_naissance = $request->date_naissance;
        $apprenant->telephone = $request->telephone;
        $apprenant->adresse = $request->adresse;
        $apprenant->universite_id = $request->universite_id;
        $apprenant->update();

        return redirect('/ajouter')->with('status', 'L\'apprenant a été modifié avec succès.');
 
    }

    public function supprimer_apprenant($id)
    {
        $apprenant = Apprenant::find($id);
         $apprenant->delete();
         return redirect('/ajouter')->with('status', 'L\'apprenant a été supprimé avec succès.');

    }

    
}
