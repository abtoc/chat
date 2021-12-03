<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'sex', 'birthday', 'perf', 'comment',
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
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'birthday' => 'date',
        'last_login_at' => 'datetime',
    ];

    //
    public function getPerfNameAttribute()
    {
        return config('perf')[$this->perf];
    }
    public function getAgeNameAttribute()
    {
        if($this->age < 20){
            return "18-19歳";
        } elseif($this->age < 24){
            return "20代前半";
        } elseif($this->age < 27){
            return "20代半ば";
        } elseif($this->age < 30){
            return "20代後半";
        } elseif($this->age < 34){
            return "30代前半";
        } elseif($this->age < 37){
            return "30代半ば";
        } elseif($this->age < 40){
            return "30代後半";
        } elseif($this->age < 44){
            return "40代前半";
        } elseif($this->age < 47){
            return "40代半ば";
        } elseif($this->age < 50){
            return "40代後半";
        } elseif($this->age < 54){
            return "50代前半";
        } elseif($this->age < 57){
            return "50代半ば";
        } elseif($this->age < 60){
            return "50代後半";
        } elseif($this->age < 64){
            return "60代前半";
        } elseif($this->age < 67){
            return "60代半ば";
        } elseif($this->age < 70){
            return "60代後半";
        } else {
            return "70代以上";
        }
    }

    public function calcAge()
    {
        $birthday = $this->birthday->format('Ymd');
        $now = Carbon::now()->format('Ymd');

        return floor(($now - $birthday)/10000);
    }
    public function updateAge()
    {
        if($this->age !== $this->calcAge()){
            $this->age = $this->calcAge();
        }
    }
    public static function boot()
    {
        parent::boot();

        self::creating(function (User $user){
            $user->updateAge();
            $user->last_login_at = now();
        });
        self::updating(function (User $user){
            $user->updateAge();
        });
    }
}
