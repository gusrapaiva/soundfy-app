<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class musica extends Model
{
    use HasFactory;

    protected $fillable = [
        "nome",
        "tempo",
        "id_artista",
        "id_album",
    ];
}
