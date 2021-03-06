<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permission;
class PruebaController extends Controller
{

    public function primerMetodo(Request $request) {
        $vars = $request->only('hoa',"asd"); //obtener ciertos elementos del request
        $vars = $request->all(); // Obtiene todos los elementos del request
        return $vars;
    }

    public function index(){
        $permisos = Permission::all();
        //compact('permisos');
        return view('permisos.index' , ['permisos' => $permisos]);
    }

    public function create() {
        return view('permisos.create');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required|string'
        ]);

        $permiso = Permission::create([
            'name' => $request->name
        ]);

        return redirect('/permisos');
    }

    public function edit(Request $request, $id){
        return view('permisos.edit', ['permiso' => Permission::find($id)]);
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'name' => 'required|string'
        ]);

        $permiso = Permission::find($id);
        $permiso->name = $request->name;
        $permiso->save();

        return redirect('/permisos');        
    }
    public function destroy(Request $request, $id) {
        if ($permiso = Permission::find($id)) {
            $permiso->delete();
        }

        return redirect('/permisos');
    }

}
