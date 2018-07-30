<?php

namespace App\Http\Controllers;

use App\Tarefa;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class TarefaController extends Controller
{
    public function listar(){
        $tarefas = Tarefa::all();
        return view('index', compact('tarefas'));
    }

    public function cadastrar(){
        $tarefa = new Tarefa();
        $tarefa->tarefa = request()->tarefa;
        $tarefa->data = request()->data;
        $tarefa->status = request()->status;

        $tarefa->save();

        return redirect()->to('/');
    }

    public function excluir(){
        $id = request()->id;
        $tarefa = Tarefa::find($id);
        $tarefa->delete();

        return redirect()->to('/');
    }

    public function alterar(){
        $id = request()->id;
        $tarefa = Tarefa::find($id);
        $tarefa->tarefa = request()->tarefa;
        $tarefa->data = request()->data;
        $tarefa->status = request()->status;
        $tarefa->save();

        return redirect()->to('/');
    }
    public function mail(Request $request){
        Mail::send('contact',$request->all(), function($msj){
            $msj->subject('Correo de contacto');
            $msj->to('julio.diniz@configr.com');
        });
        return Redirect::to('/');
    }
}
