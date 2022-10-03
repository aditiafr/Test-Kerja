<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;
    protected $table = 'tbl_buku';
    protected $guarded = ['id'];
    public $timestamps = false;
    protected $primaryKey = 'id_buku';
    protected $keyType = 'string';
    public $incrementing = false;
}
