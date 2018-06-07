<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable=[
        'id',
        'Member_id',
        'Store_id',
        'content',
        'rate',
    ];

    protected $table="comments";
}
