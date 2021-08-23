<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'posts';
    protected $primaryKey='id_post';
    protected $fillable = [
        'id_post',
        'name',
        'post',
        'img'
    ];  
}
