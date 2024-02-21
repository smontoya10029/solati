<?php

namespace App\Http\Controllers\solati;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employe;

class EmployesController extends Controller
{
    
    public function index()
    {

        try{

            $data = Employe::get();
            return response()->json($data, 200);

        }catch(\throwable $th) {

            return response()->json([ 'erro' => $th->getMessage() ], 500);

        }

    }

    public function add(Request $request)
    {

        try{

            $data['nombre'] = $request['nombre'];
            $data['apellido'] = $request['apellido'];
            $data['telefono'] = $request['telefono'];
            $res = Employe::create($data);
            return response()->json($res, 200);

        }catch(\throwable $th) {

            return response()->json([ 'erro' => $th->getMessage() ], 500);

        }

    }

    public function getById($id)
    {

        try{

            $data = Employe::find($id);
            return response()->json($data, 200);

        }catch(\throwable $th) {

            return response()->json([ 'erro' => $th->getMessage() ], 500);

        }        

    }

    public function update(Request $request, $id)
    {

        try{

            $data['nombre'] = $request['nombre'];
            $data['apellido'] = $request['apellido'];
            $data['telefono'] = $request['telefono'];
            Employe::find($id)->update($data);
            $data = Employe::find($id);
            return response()->json($data, 200);

        }catch(\throwable $th) {

            return response()->json([ 'erro' => $th->getMessage() ], 500);

        }

    }

    public function delete($id)
    {

        try{

            $data = Employe::find($id)->delete();
            return response()->json([ 'delete' => $data ], 200);

        }catch(\throwable $th) {

            return response()->json([ 'erro' => $th->getMessage() ], 500);

        }        

    }

}
