<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Database\QueryException;

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
        //$new_task = $request->input('text_new_task');
        try{
            $new_task = new Task();
            $new_task->task = $request->input('text_new_task');
            $new_task->save();
            return redirect()->route('home')->with('success','Task created successfully');
        } catch (QueryException $e){
            return redirect()->route('new_task')->with('danger','Error when try to save your task');
            //return back()->with('danger','Error when try to save your task');
        }


    }//function

}//class
