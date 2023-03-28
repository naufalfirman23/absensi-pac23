<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pengurus extends Model
{
    use HasFactory;
    protected $table = 'pengurus';
    protected $guarded = [];
    protected $primaryKey = 'id_pengurus';

    public function jabatan()
    {
        return $this->belongsTo(ModelsJabatan::class, 'id_jabatan');
    }

    public function departemen()
    {
        return $this->belongsTo(ModelsDepartemen::class, 'id_departemen');
    }

    public function ranting()
    {
        return $this->belongsTo(ModelsRanting::class, 'id_ranting');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'id_users');
    }
}
