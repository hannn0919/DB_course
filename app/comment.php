<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    protected $table="comment";
    public $timestamps = false;
    protected $primaryKey="CommentNo";
}
