<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute ;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded =[];
    protected function statusText():Attribute
    {
        return Attribute::make(
            get: fn()=> $this->status==1?'Active':'inactive',
        );
    }
    protected function IsFavourite():Attribute
    {
 return Attribute::make(
    get: fn($value) => $value== 1?'on':'off',
    set: fn($value) => $value== 'on'?1:0
 );
    }
    protected $appends=['status_text'];
}
