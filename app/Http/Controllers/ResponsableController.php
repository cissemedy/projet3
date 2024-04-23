<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Responsable;
use Illuminate\View\View;

class ResponsableController extends Controller
{
   
    public function liste_responsable()
    {
        $responsables = Responsable::paginate(3);
        return view('responsable.liste',compact('responsables'));
    }
    public function detail_responsable(string $id):View
    {
        $responsables = Responsable::find($id);
        return view('responsable.detail')->with('responsables', $responsables);
    }


    public function ajouter_responsable() 
    {
        return view('responsable.ajouter');
    }
    public function ajout_responsable_traitement(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'adresse' => 'required',
            'E_mail' => 'required',
            'numero'=> 'required',
        ]);
        $responsable = new Responsable();
        $responsable->nom = $request->nom;
        $responsable->prenom = $request->prenom;
        $responsable->adresse = $request->adresse;
        $responsable->E_mail = $request->E_mail;
        $responsable->numero = $request->numero;
        $responsable->save();

        return redirect('/ajout')->with('status','L\'responsable a bien été ajouté avec succés');
    }
    public function updat_responsable($id){
        $responsables = Responsable::find($id);
        return view('responsable.update',compact('responsables'));
    }
    public function updat_responsable_traitement(Request $request){
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'adresse' => 'required',
            'E_mail' => 'required',
            'numero'=> 'required',
        ]);
        $responsable = Responsable::find($request->id);
        $responsable->nom = $request->nom;
        $responsable->prenom = $request->prenom;
        $responsable->adresse = $request->adresse;
        $responsable->E_mail = $request->E_mail;
        $responsable->numero = $request->numero;
        $responsable->update();
        return redirect('/ajout')->with('status','L\'responsable a bien été modifier avec succés.');

    }
    public function delete_responsable($id){
        $responsable = Responsable::find($id);
        $responsable->delete();
        return redirect('/ajout')->with('status','L\'responsable a bien été supprimé avec succés.');

    }
    
}
