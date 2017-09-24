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

    /**
     * Función para mostrar todos los medicamentos
     *
     * @return void
     */
    public function index(){
        $meds = Med::all();
        return view('meds.index', compact('meds'));
    }

    /**
     * Función para mostrar un solo medicamento
     *
     * @param [type] $slug
     * @return void
     */
    public function show($slug){
        $med = Med::whereSlug($slug)->firstOrFail();
        return view('meds.show', compact('med'));
    }

    public function edit($slug){
        $med = Med::whereSlug($slug)->firstOrFail();
        return view('meds.edit', compact('med'));
    }

    public function destroy($slug){
        $med = Med::whereSlug($slug)->firstOrFail();
        $med->delete();
        return redirect('/meds')->with('status', 'El medicamento '.$slug.' ha sido borrado');
    }
    

    /**
     * Función para agregar nuevos medicamentos
     *
     * @param MedFormRequest $request
     * @return void
     */
    public function store(MedFormRequest $request){
        $slug = uniqid();
        
        //Obtenemos la imagen
        $file = $request->urlImage; 
        
        //Cogemos el nombre del archivo
        $nombre = $file->getClientOriginalName();
            
        try{
            //indicamos que queremos guardar un nuevo archivo en el disco local
            \Storage::disk('local')->put($nombre,  \File::get($file));

        }catch(Exception $e){
            return redirect('/create')->with('status', 'No se ha subido el archivo');
        }

        //Datos de medicamento que entrarán en la base de datos
        $med = new Med(array(
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'actividad' => $request->get('actividad'),
            'grupo' => $request->get('grupo'),
            'urlImage' => $nombre,
            'slug' => $slug
        ));

        $med->save();

        $data = array(
            'med' => $slug,
        );
        
        return redirect('/create')->with('status', 'Su medicamento ha sido agregado. Su id única es '.$slug);
    }
}