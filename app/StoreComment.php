<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StoreComment extends Model
{
    protected $fillable=[
        'id',
        'Member_id',
        'Store_id',
        'content',
    ];

    protected $table="comment_store";
}
