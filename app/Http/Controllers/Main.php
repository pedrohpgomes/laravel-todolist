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
        echo 'new_task';
    }
}//class
