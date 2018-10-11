<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskModel extends Model
{
    protected $table='tasks';
    protected $guarded=[];
    public static function getDesigner()
    {
        $tasks = Role::with('users')->where('name', 'Designer')->get();
        $newTasks= [];
        foreach($tasks as $task){
            foreach ($task->users as $user){
                $newTasks[$user->id]=$user->name;
            }
        }
        return $newTasks;
    }
}
