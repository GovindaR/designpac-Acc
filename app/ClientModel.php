<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientModel extends Model
{
    public static function getClient()
    {
        $clients = Role::with('users')->where('name', 'Client')->get();
        $newClients= [];
        foreach($clients as $teacher){
            foreach ($teacher->users as $user){
                $newClients[]=$user;
            }
        }
        return $newClients;
    }
}
