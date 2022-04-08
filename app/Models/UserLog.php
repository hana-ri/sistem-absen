<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLog extends Model
{
    use HasFactory;

    protected $guarded = [];
    public $timestamps = false;


    // Eiger Loading
    protected $with = ['userCard'];

    /**
     * Relations
     * */ 
    public function UserCard()
    {
        return $this->belongsTo(UserCard::class);
    }
}
