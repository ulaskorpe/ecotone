<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Location extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'locations';
    protected $primaryKey = 'idlocation';
    protected $fillable = ['idlocation',
        'idwarehouse','idlocation_type','parent_idlocation','name','unlink_on_empty','is_bulk_location'

    ];


    public function warehouse(){
        return $this->hasOne(WareHouse::class,'idwarehouse','idwarehouse');
    }

    public function location_type(){
        return $this->hasOne(LocationType::class,'idlocation_type','idlocation_type');
    }
}
