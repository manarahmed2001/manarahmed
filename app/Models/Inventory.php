<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Inventory extends Model
{
    
    use HasFactory ;
    protected $fillable =['name','city_id','phone','is_active' ] ;
    public function city(){
        return $this->belongsTo(City::class,'city_id' ,'id');
    }
    public function items(){
        return $this->belongsToMany(Item::class,'inventory_items','inventory_id' ,'item-id','id' ,'id');
    }
    public function purcheaseorders(){
        return $this->hasMany(purchease_orders::class,'inventory_id' ,'id');
    }
}
