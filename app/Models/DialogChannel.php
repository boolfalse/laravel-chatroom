<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DialogChannel extends Model
{
    use SoftDeletes;

    protected $table = 'dialog_channels';

    protected $fillable = [
        'id',
        'channel_token',
        'owner_id',
        'user_ids',
        'name',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'user_ids' => 'array',
    ];

    protected $dates = [
        'deleted_at',
    ];

    public function conversations(){
        return $this->hasMany(Conversation::class, 'dialog_channel_id', 'id')->latest('id');
    }

    public function owner(){
        return $this->belongsTo(User::class, 'owner_id', 'id');
    }
}
