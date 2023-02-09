<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 
class Assets extends Model
{
    protected $table = 'assets_type';
    protected $primaryKey = 'assets_type_id';
    protected $fillable = ['assets_name','status'];
}