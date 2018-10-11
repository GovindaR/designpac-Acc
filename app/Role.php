<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogsActivityInterface;
use Spatie\Activitylog\LogsActivity;

class Role extends Model
{

    /**
     * The attributes that are fillable via mass assignment.
     *
     * @var array
     */
    protected $fillable = ['name', 'slug', 'description'];

    /**
     * The users that belong to the role.
     */
    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    public function createLog()
    {
        $data = [
            'user_id' => \Auth::id(),
            'operation' => 'Role ' . $this->name . ' was added',
            'link' => '/roles/' . $this->id . '/edit'
        ];
        Log::create($data);
    }

    public function updateLog()
    {
        $data = [
            'user_id' => \Auth::id(),
            'operation' => 'Role ' . $this->name . ' was updated',
            'link' => '/roles/' . $this->id . '/edit'
        ];
        Log::create($data);
    }

    public function deleteLog()
    {
        $data = [
            'user_id' => \Auth::id(),
            'operation' => 'Role ' . $this->name . ' was deleted',
        ];
        Log::create($data);
    }
}
