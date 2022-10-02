<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $table = 'tbl_siswa';
    protected $guarded = ['nis'];
    public $timestamps = false;
    protected $primaryKey = 'nis';
}
