<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Hamcrest\Core\HasToString;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;


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
    public function cadusuario(Request $form)
    {
        $rules = [
            'name'=> 'required|string|min:3',
            'cpf' =>  'required|min:11|max:11',
            'rg'=> 'required|min:7|max:7',
            'senha'=>'required|min:8'
        ];
        $messages = [
            'name.required'=>'Preencha o camo nome',
            'cpf.required'=>'Preencha o campo CPF',
            'cpf.min'=>'Preencha o CPF com 11 algarismos',
            'rg.required'=> 'Preencha o campo RG',
            'rg.min'=>'Preencha o RG com 7 caracteres',
            'senha.required'=>'Preencha o camo senha',
            'senha.min'=>'preencha o campo senha com no minimo 8 caracteres'
        ];
        return response($this->validate($form,$rules,$messages));

        User::create([
            'name' => $form['name'],
            'cpf' => $form['cpf'],
            'rg' => $form['rg'],
            'data_nascimento' => $form['data_nascimento'],
            'password' => Hash::make($form['password']),
            'perfil_id' => '1'
        ]);
        return ['mensagem'=>'Cadastrado'];
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
