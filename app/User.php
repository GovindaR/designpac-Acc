<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Activitylog\LogsActivityInterface;
use Spatie\Activitylog\LogsActivity;
use Laravel\Cashier\Billable;
use Laravel\Cashier\Contracts\Billable as BillableContract;


class User extends Authenticatable
{
    use Billable;
    protected $dates = ['trial_ends_at', 'subscription_ends_at'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','email', 'password','last_name'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',

    ];

    /**
     * The roles that belong to the user.
     */
    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

    /**
     * Check whether a user has given role or not
     */
    public function hasRole($role)
    {
        $user = \Auth::user();
        $userRoles = [];
        foreach ($user->roles as $r) {
            $userRoles[] = $r->slug;
        }
        if (strpos($role, '|')) {
            $roles = explode('|', $role);
            foreach ($roles as $rol) {
                if (in_array($rol, $userRoles))
                    return true;
            }
        }
        if (strpos($role, ',')) {
            $roles = explode(',', $role);
            if (array_intersect($roles, $userRoles) == $roles) {
                return true;
            }
        }
        if (in_array($role, $userRoles))
            return true;
        return false;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    public function createLog()
    {
        $data = [
            'user_id' => \Auth::id(),
            'operation' => 'User ' . $this->name . ' was added',
            'link' => '/users/' . $this->id . '/edit'
        ];
        Log::create($data);
    }

    public function updateLog()
    {
        $data = [
            'user_id' => \Auth::id(),
            'operation' => 'User ' . $this->name . ' was updated',
            'link' => '/users/' . $this->id . '/edit'
        ];
        Log::create($data);
    }

    public function deleteLog()
    {
        $data = [
            'user_id' => \Auth::id(),
            'operation' => 'User ' . $this->name . ' was deleted',
        ];
        Log::create($data);
    }

    public static function getuser($id)
    {
        $u = User::find($id);
        return $u;
    }

}