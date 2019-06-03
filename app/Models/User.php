<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';

    const NOT_CONFIRMED = 'not_confirmed';
    const ACTIVE = 'active'; // confirmed
    const BLOCKED = 'blocked';

    protected $fillable = [
        'name',
        'email',
        'password',
        'confirm_token',
        'dialog_channel_ids',
        'image',
        'storage_original_image_path',
        'status',

        'first_name',
    ];

    protected $hidden = [
        'password',
        'new_password',
        'remember_token',
    ];

//    protected $appends = [
//        'first_name',
//    ];

    protected $casts = [
        'dialog_channel_ids' => 'array',
        'email_verified_at' => 'datetime',
    ];

    public function conversationsForDialogChannel($dialog_channel_id){
        return $this->hasMany(Conversation::class, 'user_id', 'id')->where('dialog_channel_id', $dialog_channel_id);
    }

//    public function setChangePasswordAttribute($password)
//    {
//        $this->attributes['password'] = bcrypt($password);
//    }

    // ACCESSORS
    public function getFirstNameAttribute($user)
    {
        return explode(' ', $this->name, 2)[0];
    }

}
