<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Database\QueryException;

class Main extends Controller
{
    // ================================================
    public function home(){
        $data = [
            //'tasks' => Task::all()
            'tasks' => Task::where('visible',1)->orderBy('created_at','desc')->get()
        ];
        return view('home',$data);
    }//function

    // ================================================
    public function new_task(){
        return view('new_task_frm');
    }//function

    // ================================================
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

    // ================================================
    public function task_done($id_task){
        $task = Task::find($id_task);
        if(isset($task)):
            $task->done = new \Datetime();
            $task->save();
            return redirect()->route('home')->with('success','Task updated successfully');
        else:
            return redirect()->route('home')->with('danger','Task not found');
        endif;
    }//function

    // ================================================
    public function task_undone($id_task){
        $task = Task::find($id_task);
        if(isset($task)):
            $task->done = null;
            $task->save();
            return redirect()->route('home')->with('success','Task updated successfully');
        else:
            return redirect()->route('home')->with('danger','Task not found');
        endif;
    }//function

    // ================================================
    public function edit_task($id_task){
        $task = Task::find($id_task);
        if(isset($task)):
            $data = ['task' => $task];
            return view('edit_task_frm',$data);
        else:
            return redirect()->route('home')->with('danger','Task not found');
        endif;
        
    }//function

    // ================================================
    public function edit_task_submit(Request $request){
        $id_task = $request->input('id_task');
        $description_task = $request->input('text_edit_task');
        $task = Task::find($id_task);
        if(isset($task) && $description_task != null):
            $task->task = $description_task;
            $task->save();
            return redirect()->route('home')->with('success','Task updated successfully');
        else:
            if(!isset($task)):
                return redirect()->route('home')->with('danger','Task not found');
            elseif($description_task == null):
                return back()->with('danger','Task description cannot be empty');
            endif;
        endif;

    }//function

    // ================================================
    public function task_visible($id_task){
        $task = Task::find($id_task);
        if(isset($task)):
            $task->visible = 1;
            $task->save();
            return redirect()->route('home')->with('success','Task updated successfully');
        else:
            return redirect()->route('home')->with('danger','Task not found');
        endif;
    }//function

    // ================================================
    public function task_invisible($id_task){
        $task = Task::find($id_task);
        if(isset($task)):
            $task->visible = 0;
            $task->save();
            return redirect()->route('home')->with('success','Task updated successfully');
        else:
            return redirect()->route('home')->with('danger','Task not found');
        endif;
    }//function

    // ================================================
    public function list_invisible_tasks(){
        $tasks = Task::where('visible',0)
                    ->orderBy('created_at','desc')
                    ->get();
        $data = [
            'tasks' => $tasks
        ];
        return view('home',$data);
    }//function
    
        

    

}//class
