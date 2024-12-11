<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cv extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'contact_info',
        'education',
        'work_experience',
        'skills',
        'languages',
        'user_id', // Asegúrate de incluir 'user_id' si se asigna
    ];

    /**
     * Relación con el usuario.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
