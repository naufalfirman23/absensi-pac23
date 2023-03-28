<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelAbsensi extends Model
{
    use HasFactory;
    protected $table = 'absensi';
    protected $guarded = [];
    protected $primaryKey = 'id';

    public function pengurus()
    {
        return $this->belongsTo(Pengurus::class, 'id_pengurus');
    }
    
    public function event()
    {
        return $this->belongsTo(ModelEvents::class, 'id_event');
    }
    
}
