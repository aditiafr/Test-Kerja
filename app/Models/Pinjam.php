<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pinjam extends Model
{
    use HasFactory;
    protected $table = 'tbl_pinjam';
    protected $guarded = ['id_pinjam'];
    public $timestamps = false;
    protected $primaryKey = 'id_pinjam';
    protected $keyType = 'string';
    public $incrementing = false;
}
