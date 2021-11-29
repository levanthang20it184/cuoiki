<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\City;
class Feeship extends Model
{
    
   
    protected $table='tbl_feeship';
    protected $fillable=[
		'fee_matp','fee_maqh','fee_xaid','fee_feeship'
    ];
    protected $primaryKey='fee_id';
   
    public function citys()
    {
        return $this->belongsTo(City::class,'fee_matp','matp');
    }
    public function province()
    {
        return $this->belongsTo(Province::class,'fee_maqh','maqh');
    }
    public function wards()
    {
        return $this->belongsTo(Wards::class,'fee_xaid','xaid');
    }
}
