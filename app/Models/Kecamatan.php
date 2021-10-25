<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;
    protected $table = 'kecamatans';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'kecamatan', 'kabupaten_id'];

    public function kabupatens()
    {
        return $this->belongsTo(Kabupaten::class, 'kabupaten_id');
    }
}
