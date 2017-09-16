<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\MedFormRequest;
use App\Med;

class MedsController extends Controller
{
    /**
     * Función que carga la página de administración de nuevos medicamentos
     *
     * @return void
     */
    public function create(){
        return view('meds.create');
    }

    public function index(){
        $meds = Med::all();
        return view('meds.index', compact('meds'));
    }

    
    public function show($slug){
        $med = Med::whereSlug($slug)->firstOrFail();
        return view('meds.show', compact('med'));
    }
    

    /**
     * Función para agregar nuevos medicamentos
     *
     * @param MedFormRequest $request
     * @return void
     */
    public function store(MedFormRequest $request){
        $slug = uniqid();
        $med = new Med(array(
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'urlImage' => $request->get('urlImage'),
            'slug' => $slug
        ));

        $med->save();

        $data = array(
            'med' => $slug,
        );
        
        
        return redirect('/create')->with('status', 'Su medicamento ha sido agregado. Su id única es '.$slug);
    }



}
