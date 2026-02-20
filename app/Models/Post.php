<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use CrudTrait;
    //
    //  use HasFactory, Notifiable;

     protected $fillable = [
        'title',
        'description',
        'image',
    ];
}
