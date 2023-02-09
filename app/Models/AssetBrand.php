<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 
class AssetBrand extends Model
{
    protected $table = 'assets_brand';
    protected $primaryKey = 'assets_brand_id';
    protected $fillable = ['assets_type_id','brand_name','status'];
}