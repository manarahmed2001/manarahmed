<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vendor extends Model
{
    use HasFactory ,SoftDeletes;

    protected $fillable =['email', 'first_name', 'last_name' , 'is_active' , 'phone' , 'deleted_at'] ;
    public function adress(){
        return $this->morphOne(Address::class ,'addressable','addressable_type','addressable_id','id') ;
    }
    public function items(){
        return $this->belongsToMany(Item::class,'vendor_items','vendor-id','item_id' ,'id' ,'id');
    }
}
