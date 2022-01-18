<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class Main extends Controller
{
    public function home(){

        $data = [
            'tasks' => Task::all()
        ];
        return view('home',$data);
    }//function

    public function new_task(){
        return view('new_task_frm');
    }//function

    public function new_task_submit(Request $request){
        
        //if($request->isMethod('post')):
        // Nao preciso dessa verificação pq na route ele já está como aceitando apenas o post
        // $request->input() pega todos os inputs
        
        $new_task = $request->input('text_new_task','valor padrao caso nao exista');
        echo $new_task;

    }//function

}//class
