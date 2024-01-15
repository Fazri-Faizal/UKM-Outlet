<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_product_pic extends Model
{
    use HasFactory;
    protected $table = 'tbl_product_pic';
    protected $fillable = ['foldername'];
    public $timestamps = false;
}
?>
