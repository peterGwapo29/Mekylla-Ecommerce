<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories'; // Table name

    protected $primaryKey = 'category_id'; // Custom primary key

    protected $fillable = [
        'category_name',
        'description',
    ];
}
