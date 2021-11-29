<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donhang extends Model
{
   public $timestamps=false;
    protected $fillable=[
		'quantity','price','matp','maqh','xaid','total','name','sdt','email','phuongthucthanhtoan'
    ];

    protected $primaryKey='id';
    protected $table='donhang';
    public function citys()
    {
        return $this->belongsTo(City::class,'matp','matp');
    }
    public function province()
    {
        return $this->belongsTo(Province::class,'maqh','maqh');
    }
    public function wards()
    {
        return $this->belongsTo(Wards::class,'xaid','xaid');
    }
}
