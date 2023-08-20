<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use HasFactory ,SoftDeletes;
    protected $fillable =['name', 'image', 'brand_id' , 'is_active', 'price','deleted_at'] ;

    public function brand(){
        return $this->belongsTo(Brand::class,'brand_id' ,'id');
    }
    public function inventories(){
        return $this->belongsToMany(Inventory::class,'inventory_items','item-id','inventory_id' ,'id' ,'id');
    }
    public function vendors(){
        return $this->belongsToMany(Vendor::class,'vendor_items','item-id','vendor_id' ,'id' ,'id');
    }
    public function purcheaseorders(){
        return $this->hasMany(purchease_orders::class,'item_id' ,'id');
    }
   


}
