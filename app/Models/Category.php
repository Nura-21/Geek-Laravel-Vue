<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    use \App\Traits\TraitUuid;
    protected $fillable = ['code' , 'icon', 'name'];
}
