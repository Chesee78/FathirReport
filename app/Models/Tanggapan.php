<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tanggapan extends Model
{
    protected $table = 'tanggapan';
    protected $fillable = ['pengaduan_id', 'petugas_id', 'tgl_tanggapan', 'tanggapan'];
    protected $casts = ['tgl_tanggapan' => 'date'];

    public function pengaduan(): BelongsTo
    {
        return $this->belongsTo(Pengaduan::class);
    }

    public function petugas(): BelongsTo
    {
        return $this->belongsTo(User::class, 'petugas_id');
    }
}
