<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Niveau;
use Illuminate\View\View;

class NiveauController extends Controller
{   

    public function index_niveau(){
        return view('niveaux.index');
    }

    public function detail_niveau(string $id):View
     {
         $niveaux = Niveau::find($id);
         return view('niveaux.detail')->with('niveaux', $niveaux);
     }
 

    public function liste_niveau()
    {
        $niveaux = Niveau::paginate(2);
        return view('niveaux.liste', compact('niveaux'));
    }

    public function ajoute_niveau()
    {
        return view('niveaux.ajoute'); 
    }

    

    public function ajoute_niveau_traitement(Request $request)
    {
        $request->validate([
            'licence_1'=>'required',
            'licence_2'=>'required',
            'licence_3'=>'required',
            'master_1'=>'required',
            'master_2'=>'required',
            'doctorat'=>'required'
        ]);

        $niveau = new Niveau();

        $niveau ->licence_1 = $request->licence_1 ;
        $niveau ->licence_2  = $request->licence_2;
        $niveau ->licence_3  = $request->licence_3;
        $niveau ->master_1 = $request->master_1;
        $niveau ->master_2 = $request->master_2;
        $niveau ->doctorat = $request->doctorat;
        $niveau->save();

        return redirect('/ajoute')->with('status','Le\'niveau a bien été ajouté avec succes.');
    }

    public function update_niveau($id){
        $niveaux = Niveau::find($id);
        return view('niveaux.update', compact('niveaux'));
        
    }
    
    public function update_niveau_traitement(Request $request){

        $request->validate([
            'licence_1'=>'required',
            'licence_2'=>'required',
            'licence_3'=>'required',
            'master_1'=>'required',
            'master_2'=>'required',
            'doctorat'=>'required'
            
        ]);

       $niveau = Niveau::find($request->id); 

        $niveau ->licence_1 = $request->licence_1;
        $niveau ->licence_2  = $request->licence_2;
        $niveau ->licence_3  = $request->licence_3;
        $niveau ->master_1 = $request->master_1;
        $niveau ->master_2 = $request->master_2;
        $niveau ->doctorat = $request->doctorat;
        $niveau->update();
        return redirect('/ajoute')->with('status', 'Le\niveau a bien été  modifié avec succes.');

    }
    public function delete_niveau($id)
    {
        $niveau = Niveau::find($id);
        $niveau->delete();
        return redirect('/ajoute')->with('status', 'Le\niveau a bien été  supprimé avec succes.'); 

    }

   
}
