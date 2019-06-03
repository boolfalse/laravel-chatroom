<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Conversation extends Model
{
    use SoftDeletes;

    protected $table = 'conversations';

    protected $fillable = [
        'id',
        'user_id',
        'dialog_channel_id',
        'text',
        'created_at',
        'updated_at',
    ];

    protected $dates = [
        'deleted_at',
    ];

    public function dialogChannel(){
        return $this->belongsTo(DialogChannel::class, 'dialog_channel_id', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    // ACCESSORS

    public function getWrittenAttribute(){
//        return $this->created_at;
//        return date("d-M-Y h:i", strtotime($this->attributes['created_at']));
//        return date("d-M-Y h:i", strtotime($this->created_at));

        return Carbon::parse($this->created_at)->format('h:i');
    }
}
