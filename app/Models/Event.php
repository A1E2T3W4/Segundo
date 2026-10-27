<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $casts = [
        "items" =>"array"
    ];

    protected $dates = ["date"];

    protected $guarded = [];

    public function user(){

     return $this->belongsTO("App\Models\User");
     }
     
    public function users()
{
    return $this->belongsToMany(
        User::class,
        'event_user',
        'event_id',
        'user_id'
    );
}
}
