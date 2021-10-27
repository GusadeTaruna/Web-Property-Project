<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Property;

class ZoningType extends Model
{
    use HasFactory;
    protected $table = "zoning_type";

    public function property_list(){
        return $this->hasOne(Property::class, 'id');
    }
}
