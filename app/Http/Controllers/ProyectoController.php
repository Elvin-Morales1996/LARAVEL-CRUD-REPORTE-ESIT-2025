<?php

namespace App\Http\Controllers;

use App\Models\Proyectos;
use Illuminate\Http\Request;

//importa la clase PDF que se instalo y poder usarlo
use Barryvdh\DomPDF\Facade\Pdf; // Nota que aquí es 'Pdf' con mayúscula en 'P'



class ProyectoController extends Controller
{
    /*
    controlado va las vista que va a mostrar de blade
    y funciones en este caso index es una funcion principal
     */
    //  primer paso para crear el crud
    public function index()
    {
        //paginas principal
        $proyectos = Proyectos::all();
        return view('proyectos.index', compact('proyectos'));
    }

 //crear un nuevo proyeco este es el segundo paso del CRUD
    public function create()
    {
        //retornar una vista de crear un proyecto
        return view('proyectos.crear');
    }

        /* store sirve para recibir datos y guardarlo a la base de datos ejemplo
        crear un nuevo poyecto envia los datos entonces store se encarga de recibir esos datos y mandarlos a la base de datos */
    public function store(Request $request)
    {
        $request->validate([
            /* 'required|min:3'*/
            //son los nombre del formulario de la vista crear.blade.php
            'nombre'=>['required','min:3'],
            'fuentesfondos'=>'required',
            'monto'=>'required',
            'montopatrocinado'=>'required',
            'montopropio'=>'required'
    
        ]);
    
         /*creamos una instancia para que esta variable tenga acceso y poder almacenar
         los datos que vienen del formulario y se envie a la base datos 

        fuentes_fondos: nombre del campo que tiene la tabla proyectos de la base de datos
        fuentesfondos: es el nombre del input que tiene el formulario de la vista crear.blade.php
          $proyect->fuentes_fondos = $request->fuentesfondos;
         */  
         
         

         $proyect= new Proyectos();
         $proyect->nombre = $request->nombre;
         $proyect->fuentes_fondos = $request->fuentesfondos;
         $proyect->monto_planificado = $request->monto;
         $proyect->monto_patrocinado = $request->montopatrocinado;
         $proyect->fondos_propios = $request->montopropio;
         $proyect->save();
    //este return me retorna a una vista una vez creado el curso me manda a la vista de ese curso con
    //con id
    //redirect()->route('curso.show',$curso): me redirige a una vista
         return redirect()->route('proyectos.index',$proyect);
    }

    /**
     * show(string $id): solo sirve para mostrar un dato con el id especifico
     */
    public function show(string $id)
    {
        

        return view('Proyectos.show',compact('proyecto'));
    }

    /**
     * edit(Proyectos $proyec): sirve para trar los datos del formulario que voy a editar
     * Proyectos: es la clase que viene del modelo
     * $proyec: es la variable que se crea para que podamos tener acceso a funciones
     * **** tercer paso es retornar la vista
     */
    public function edit(Proyectos $proyecto)
    {
        return view('proyectos.edit', compact('proyecto'));
    }
    

    /**
     * update(Request $request, string $id): sirve para guardar los datos editado especificado del id
     * y los guarda a la base de datos esos cambios que hice 
     
     */
    public function update(Request $request, Proyectos $proyecto)
    {
        $request->validate([
            'nombre' => 'required',
            'fuentes_fondos' => 'required',
            'monto_planificado' => 'required',
            'monto_patrocinado' => 'required',
            'fondos_propios' => 'required'
        ]);
    
        
        $proyecto->nombre = $request->nombre;
        $proyecto->fuentes_fondos = $request->fuentes_fondos;
        $proyecto->monto_planificado = $request->monto_planificado;
        $proyecto->monto_patrocinado = $request->monto_patrocinado;
        $proyecto->fondos_propios = $request->fondos_propios;
        //subir a la base de datos
        $proyecto->save();
    
        return redirect()->route('proyectos.index')->with('success', 'Proyecto actualizado correctamente');
    }
    


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Proyectos $proyecto)
    {
        $proyecto->delete(); // Elimina el proyecto
        return redirect()->route('proyectos.index')->with('success', 'Proyecto eliminado correctamente');
    }


    //para generar PDF
    public function GenerarPDF(){
        /*$proyectos = Proyectos::all(); primero crear una variable 
        depsues llamar la clase Poyectos para que pueda trar todos los datos de la base de datos*/
        $proyectos = Proyectos::all(); // Obtiene todos los proyectos

/*loadView('proyectos.reporte': carga una vista blade y la convierte en PDF
compact('proyectos'): esto me permite que la variable $proyecto que cree dentro de la funcion GenerarPDF vaya en compact
y que despues sera utilizada en una vista de blade para que esto sirve que pueda traer los datos de la base de datos
 proyectos.reporte: es el nombre de la vista que tiene la ruta proyectos/resporte.blade.pdf*/        
        $pdf = Pdf::loadView('proyectos.reporte', compact('proyectos'));
        // Carga la vista con los datos

/*stream('reporte_proyectos.pdf'): lo que sirve esque pueda ver los datos en una pestaña de navegador y le pongo un nombre a ese arcchivo
'reporte_proyectos.pdf': sera lo que llevara el nombre del PDF y extension. PDF
download('reporte_proyectos.pdf'): me permite descargar los datos de un solo */
        return $pdf->stream('reporte_proyectos.pdf'); // Descarga el PDF

    }
    
}
