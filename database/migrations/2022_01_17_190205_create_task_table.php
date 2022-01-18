<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use App\Models\Task;

class CreateTaskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        if (!Schema::hasTable('tasks')) {
            Schema::create('tasks', function (Blueprint $table) {
                $table->id();
                $table->string('task',250);
                $table->tinyInteger('visible',false,true)->default(1);
                $table->dateTime('done',0)->nullable();
                $table->dateTime('created_at',0);
                $table->dateTime('updated_at',0)->nullable();
                $table->dateTime('deleted_at',0)->nullable();
            });
        }

        if(!Task::find(2)){
            $insert = [
                [   'task' => 'task one to test',
                    'visible' => 1,
                    'done' => null,
                    'created_at' => date("Y-m-d H:i:s")
                ],
                [   'task' => 'task two',
                    'visible' => 1,
                    'done' => null,
                    'created_at' => date("Y-m-d H:i:s")
                ],
                [   'task' => 'task three',
                    'visible' => 0,
                    'done' => null,
                    'created_at' => date("Y-m-d H:i:s")
                ],
                [   'task' => 'task four',
                    'visible' => 1,
                    'done' => date("Y-m-d H:i:s"),
                    'created_at' => date("Y-m-d H:i:s")
                ],
            ];
            DB::table('tasks')->insert($insert);
        }
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
