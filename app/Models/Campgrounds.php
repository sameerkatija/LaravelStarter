<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campgrounds extends Model
{
    protected $table = 'campgrounds';
    protected $primaryKey = 'id';
    protected $fillable = ['userid', 'title', 'location', 'price','description', 'image'];
    use HasFactory;
}
