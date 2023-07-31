<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    use HasFactory;
  
    protected $fillable = [
        'nome',
        'especialidade',
        'cidade_id',
    ];
    public $timestamps = true;

    public function cidade()
    {
        return $this->belongsTo(Cidade::class);
    }
}
