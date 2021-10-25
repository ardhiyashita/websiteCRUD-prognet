<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\FuncCall;

class Kabupaten extends Model
{
    use HasFactory;
    protected $table = 'kabupatens';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'kabupaten', 'provinsi_id'];

    public function provinsis()
    {
        return $this->belongsTo(Provinsi::class, 'provinsi_id');
    }

    public function kecamatans()
    {
        return $this->hasMany(Kecamatan::class, 'kabupaten_id');
    }
}
