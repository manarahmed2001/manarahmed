<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Purchase_Order extends Model
{
 use HasFactory;
 protected $fillable =['user_id', 'item_id', 'inventory_id' , 'status','deleted_at'] ;
    public function user(){
        return $this->belongsTo(User::class,'user_id' ,'id');
    }
    public function item(){
        return $this->belongsTo(Item::class,'item_id' ,'id');
    }
    public function inventory(){
        return $this->belongsTo(Inventory::class,'inventory_id' ,'id');
    }
}
