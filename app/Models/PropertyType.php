<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyType extends Model
{
    use HasFactory;
    protected $table = "property_type";

    public function property_list(){
        return $this->hasOne(Property::class, 'id');
    }
}
