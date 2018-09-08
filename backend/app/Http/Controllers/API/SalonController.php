<?php

namespace App\Http\Controllers\API;
use App\Salon;
use Validator;
use App\Http\Resources\SalonsResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SalonController extends Controller
{

    public function __construct()
    {
      $this->middleware('auth:api')->except(['index']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listSalons = Salon::all();
        return $listSalons;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'address' => 'required',
            'phone'=> 'required',
            'email'=> 'required|string|email|max:255|unique:users',
            'contact'=> 'required',
            'state' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Creating a record in a different way
        $createSalon = Bike::create([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'contact' => $request->contact,
            'state' => $request->state,
        ]);

        return new SalonsResource($createSalon);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($salon)
    {
        return new SalonsResource($salon);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Salon $salon)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'address' => 'required',
            'phone'=> 'required',
            'email'=> 'required|string|email|max:255|unique:users',
            'contact'=> 'required',
            'state' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $salon->update($request->only(['name', 'address', 'phone', 'email', 'contact', 'state']));

        return new SalonsResource($salon);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteSalonById = Salon::find($id)->delete();
        return response()->json([], 204);
    }
}
