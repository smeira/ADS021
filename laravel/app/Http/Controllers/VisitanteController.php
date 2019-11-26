<?php

namespace App\Http\Controllers;

use App\Condominios;
use App\Http\Requests\VisitanteRequest;
use App\Unidades;
use App\Visitantes;
use Illuminate\Http\Request;

class VisitanteController extends Controller{
    public function listar(){
        $visitante = Visitantes::all();
        return view('visitante/listar', compact('visitante'));
    }

    public function criar(Request $request){
        $unidade = new Unidades();
        $condominio = Condominios::all();
        return view('visitante/formulario', compact('unidade', 'condominio'));
    }

    public function editar($id){
        $unidade = new Unidades($id);
        $condominio = Condominios::all();
        return view('visitante/formulario', compact('unidade', 'condominio'));
    }

    public function remover($id){
        $visitante = Visitantes::find($id);
        $visitante->delete();
        return redirect('visitante/listar');
    }

    public function salvar(VisitanteRequest $request){
        if($request->id){
            $visitante = Visitantes::find($request->id);
            $visitante->fill($request->all());
        } else {
            $visitante = new Visitantes($request->all());
        }

        $visitante->save();
        return redirect('visitante/listar');
    }

    public function verificarEmail($email){
        return $unidade = Unidades::where('email', $email)->count();
    }

    public function verificarRg($rg){
        return $unidade = Unidades::where('rg', $rg)->count();
    }
}
