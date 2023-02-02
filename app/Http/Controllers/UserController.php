<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Rol;
use App\Models\Persona;
use App\Http\Requests\SaveUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::with('Rol','Persona')->get();
        return response($user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveUserRequest $request)
    {
        $request->validated();
        $user = new User();
        $user->username = $request->input('username');
        $user->password = Hash::make($request->input('password'));
        $user->id_rol = $request->input('id_rol');
        $user->id_persona = $request->input('id_persona');
        if ($user->save()) {
            return response($user);
        }//
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $data = [
            'status' =>'OK',
            'message'=>'Registro encontrado',
            'articulo'=> $user
        ];

        return response()->json($data, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        
        $request->validated();
        $user = User::find($user->id);
        $user->username = $request->input('username');
        $user->password = Hash::make($request->input('password'));
        $user->id_rol = $request->input('id_rol');;
        $user->id_persona = $request->input('id_persona');;
        if ($user->save()) {
            return response()->json([
                'status' => 'OK',
                'user' => $user
            ]);
        }//
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $data = [
            'status'=>'Error',
            'message'=>'Hubo un error al eliminar el registro'
        ];

        if ($user->delete()) {
            $data = [
                'status'=>'OK',
                'message'=>'El articulo fue eliminado exitosamente'
            ];
            return response()->json($data, 200);
        }
        return response()->json($data);
    }
   
    public function users()
    {
        $user = User::all();
        return response()->json($user);
    }
    public function login(Request $request)
    {
        $response = ["status"=>0,"msg"=>""];
        $data = json_decode($request->getContent());
        $user = User::where('username',$data->username)->first();

        if($user){
            if(Hash::check($data->password,$user->password)){
                $token = $user->createToken("example");
                $response["status"]=1;
                $response["msg"]= $token->plainTextToken ;

            }else{
                $response["msg"] = "credenciales incorrectas";
            }

        }else{
            $response["msg"] = "usuario no encontrado";
        }
        return response()->json($response);
    }
}
