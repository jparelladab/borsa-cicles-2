<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'password',
        'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role(){
      return $this->belongsTo('App\Role')->first();
    }

    public function is_alumne() {
      return $this->role_id === 2;
    }

    public function is_empresa() {
      return $this->role_id === 3;
    }

    public function is_admin() {
      return $this->role_id === 1;
    }

    public function alumne() {
        return $this->hasOne('App\Alumne')->first();
    }

    public function empresa() {
        return $this->hasOne('App\Empresa')->first();
    }


}
