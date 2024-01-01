<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    
    protected $guarded = [
        'id',
    ];

    public function type(){
        return ItemType::where('id', $this->item_type_id)->first();
    }
    public function brand(){
        return ItemBrand::where('id', $this->item_brand_id)->first();
    }
}
