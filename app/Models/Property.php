<?php

namespace App\Models;
use App\Models\ZoningType;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;
    protected $table = "property_list";

    public function zoning_list()
    {
    	return $this->belongsTo(ZoningType::class, 'zoning');
    }

    public function type()
    {
    	return $this->belongsTo(PropertyType::class, 'property_type');
    }
   
}
