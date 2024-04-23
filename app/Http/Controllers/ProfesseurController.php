<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
// use Illuminate\Http\Response;
use App\Models\Professeur;
use Illuminate\View\View;

class ProfesseurController extends Controller
{
    /**
     * Display a listing of the resource.
     */


     public function index_responsables(){
        return view('responsables.index');
     }

    public function index(): View
    {
        $professeur = Professeur::paginate(3);
            return view('professeur.index')->with('professeurs', $professeur);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('professeur.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $input = $request->all();
        Professeur::create($input);
        return redirect('professeur')->with('Ajouté avec succés!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id):View
    {
        $professeur = Professeur::find($id);
        return view('professeur.show')->with('professeurs', $professeur);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id):View
    {
        $professeur = Professeur::find($id);
        return view('professeur.edit')->with('professeurs', $professeur);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $professeur = Professeur::find($id);
        $input = $request->all();
        $professeur->update($input);
        return redirect('professeur')->with('Modifié avec succés!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        Professeur::destroy($id);
        return redirect('professeur')->with('Supprimé avec succés!');
    }
}
