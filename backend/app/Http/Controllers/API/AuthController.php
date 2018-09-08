<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Image;
use Validator;

class AuthController extends Controller
{
    /**
     * Register a new user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *
     */
    public function register(Request $request)
    {
    
        
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255|unique:users',
            'name' => 'required',
            'role_id' => 'required|integer',
            'phone' => 'required',
            'password'=> 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

       
        // ruta de las imagenes guardadas
       // $ruta = public_path().'/img/';
        
        // imagen del cliente
        //$imagenOriginal = $request->photo;
        
        // crear instancia de imagen
        //$imagen = Image::make($imagenOriginal);
        
        // generar un nombre para la imagen
        //$temp_name = $request->name. '.' . $imagenOriginal->getClientOriginalExtension();
        
        //$imagen->resize(300,300);
        
        // guardar imagen( [ruta], [calidad])
        //$imagen->save($ruta . $temp_name, 100);
        
        

        $user = User::create([
            'name' => $request->name ,
            'email' => $request->email,
            'role_id' => $request->role_id,
            'phone' => $request->phone,
            'photo' => $request->photo,
            'password' => bcrypt($request->password),
        ]);

        $token = auth()->login($user);

        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ], 201);
    }

    public function login(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'password'=> 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $credentials = $request->only(['email', 'password']);

        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Invalid Credentials'], 400);
        }

        $current_user = $request->email;

        return response()->json([
        'access_token' => $token,
        'token_type' => 'bearer',
        'current_user' => $current_user,
        'expires_in' => auth()->factory()->getTTL() * 60
        ], 200);
    }

    public function logout(Request $request)
    {

        auth()->logout(true); // Force token to blacklist
        return response()->json(['success' => 'Session cerrada correctamente.'], 200);

    }

}
