<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsuarioRequest;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Hamcrest\Core\HasToString;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


use function GuzzleHttp\Promise\all;

class UserController extends Controller
{

    public function index()
    {
        return view('home');
    }
    public function cadApp()
    {
        return view('paginaInicial');
    }
    public function admin()
    {
        return view('admin.dashboardadmin', ['user' => User::all()]);
    }
    public function gestor()
    {
        return view('gestor.dashboardgestor');
    }
    public function editarUsuario(Request $form)
    {
        $user = User::find(Auth::id());
        $form->validate([
            'name' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8']
        ]);
        if ($form->post('antiga-password') !=  Hash::check($form->post('antiga-password'), $user->password)) :
            return redirect()->back();
        endif;
        $user->name = $form->post('name');
        $user->password = Hash::make($form->post('password'));
        $user->save();
        return redirect()->back()->with('msg', 'Usuario editado com sucesso!');
    }
    public function cadusuario(UsuarioRequest $form)
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
    public function getUser(Request $request)
    {
        $descriptado = Crypt::decrypt($request->get('valores'));
        return User::where('id', $descriptado)->get();
    }
    public function editaUsuarioQualquer(Request $form)
    {
        $this->validate($form, [
            'name' => 'required|string|max:255',
            'cpf' => 'required|string|min:14',
            'rg' => 'required',
            'data_nascimento' => 'required|date',
            'perfil_id' => 'Required|integer|min:1|max:3'
        ]);
        $user = User::where('cpf', '=', $form->post('cpf'))->get();
        $user = User::find($user[0]['id']);
        if ($user) :
            $campos = ['name', 'cpf', 'rg', 'data_nascimento', 'perfil_id'];
            for ($i = 0; $i < count($campos); $i++) {
                $a = $campos[$i];
                if ($form->post($a) != $user->$a) :
                    $user->$a = $form->post($a);
                endif;
            }
            $user->save();
            return redirect()->back()->with('msg', 'Usuario editado com sucesso!');
        else :
            return redirect()->back()->with('msg', 'Usuário errado');

        endif;
    }

    public function excluirusuario(Request $request)
    {
        $descriptado = Crypt::decrypt($request->get('dado'));
        $user = User::where('cpf', '=', $descriptado)->get();
        $user = User::find($user[0]['id']);
        if ($user) :
            $user->delete();
            return redirect()->back()->with('msg', 'Usuario excluido!');
        else :
            return redirect()->back()->with('msg', 'Usuário errado');
        endif;
    }
}
