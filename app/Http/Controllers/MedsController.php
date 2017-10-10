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
        $meds = Med::all();
        return view('meds.create', compact('meds'));
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

    /**
     * Función para editar un medicamento
     *
     * @param [type] $slug
     * @return void
     */
    public function edit($slug){
        $med = Med::whereSlug($slug)->firstOrFail();
        return view('meds.edit', compact('med'));
    }
    
    /**
     * Función para actualizar un medicamento
     *
     * @param [type] $slug
     * @param MedFormRequest $request
     * @return void
     */
    public function update($slug, MedFormRequest $request){
        $med = Med::whereSlug($slug)->firstOrFail();
        $med->title = $request->get('title');
        $med->description = $request->get('description');
        $med->actividad = $request->get('actividad');
        $med->grupo = $request->get('grupo');
        $med->urlImage = $request->get('urlImage');

        if($request->get('status') != null){
            $med->status = 0;
        }else{
            $med->status = 1;
        }
        $med->save();
        return redirect(action('MedsController@edit', $med->slug))->with('status', '¡El medicamento '.$slug.' ha sido actualizado!');
    }

    /**
     * Función para eliminar un medicamento
     *
     * @param [type] $slug
     * @return void
     */
    public function destroy($slug){
        $med = Med::whereSlug($slug)->firstOrFail();
        $med->delete();
        return redirect('/create')->with('status', 'El medicamento '.$slug.' ha sido borrado');
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