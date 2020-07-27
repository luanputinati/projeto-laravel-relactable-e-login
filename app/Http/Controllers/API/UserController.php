<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        return response()->json($user->all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $address = \Correios::cep($request->zipcode);

        $user = new User();
        $user->fill($request->all());
        $user->password = Hash::make($user->password);
        if(!empty($address)) {
            $user->address = $address['logradouro'];
            $user->neighborhood = $address['bairro'];
            $user->city = $address['cidade'];
            $user->state = $address['uf'];
        }
        $user->save();
        return response()->json($user, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $address = \Correios::cep($request->zipcode);

        $user->fill($request->all());
        $user->password = Hash::make($user->password);
        if(!empty($address)) {
            $user->address = $address['logradouro'];
            $user->neighborhood = $address['bairro'];
            $user->city = $address['cidade'];
            $user->state = $address['uf'];
        }
        $user->save();

        return response()->json($user, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return response()->json([], 200);
    }
}
