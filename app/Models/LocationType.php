<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class LocationType extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'location_types';
    protected $primaryKey = 'idlocation_type';
    protected $fillable = ['idlocation_type','name','default','color'];



}
