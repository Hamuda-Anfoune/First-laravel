<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class newUser extends Authenticatable // replaced Model with Authenticatable
{
    use Notifiable;

    // DOCUMENTATION AT: https://laravel.com/docs/6.x/eloquent#defining-models

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'name', 'account_type_no', 'password',
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
        // 'email_verified_at' => 'datetime',
    ];

    protected $primaryKey = 'user_id'; // Setting PrimaryKey

    public $incrementing = false; // To stop Eloquent from assuming primaryKey is auto incrementing

    protected $keyType = 'string'; // To stop Eloquent from assuming primaryKey is an int

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'max_hours' => Null,
        'max_modules' => Null,
    ];

    /**
     * The connection name for the model.
     *
     * @var string
     */
    // protected $connection = 'connection-name';


}
