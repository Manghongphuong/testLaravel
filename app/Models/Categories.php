<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    protected $table = "categories";
    protected $primaryKey = "id";
    protected $fillable = [
        'name_ct'
    ];

    public function blogs()
    {
        return $this->hasMany(Blogs::class, 'id_category', 'id');
    }
}
