<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Penerimaan;

class Donor extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'email',
        'hp',
        'umur',
        'berat',
        'goldar',
        'foto',
    ];

    public function penerimaan()
    {
        return $this->hasOne(Penerimaan::class);
    }
}
