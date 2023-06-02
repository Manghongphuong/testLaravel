<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blogs extends Model
{
    use HasFactory;
    protected $table = "blogs";
    protected $primaryKey = "id";
    protected $fillable = [
        'id_category',
        'title',
        'synopsis',
        'content',
        'image'
    ];
    
    public function category(){
        return $this->hasOne(Categories::class,'id_category','id');
    }
}
