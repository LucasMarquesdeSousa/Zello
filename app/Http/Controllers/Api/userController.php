<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UsuarioRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        return response()->json($user);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsuarioRequest $form)
    {
        $cpf = User::where('cpf', '=', $form->post('cpf'))->get();
        $rg = User::where('rg', '=', $form->post('rg'))->get();
        if (count($cpf)) :
            return ['cpf' => 'CPF existente'];
        elseif (count($rg)) :
            return ['rg' => 'RG existente'];
        endif;
        User::create([
            'name' => $form['name'],
            'cpf' => $form['cpf'],
            'rg' => $form['rg'],
            'data_nascimento' => $form['data_nascimento'],
            'password' => Hash::make($form['password']),
            'perfil_id' => '1',
            'api_token'=> Str::random(60),
        ]);
        return ['mensagem' => 'Cadastrado com sucesso'];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
