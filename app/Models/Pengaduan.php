<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pengaduan extends Model
{
    protected $table = 'pengaduan';
    protected $fillable = ['user_id', 'nik', 'tgl_pengaduan', 'isi_laporan', 'foto', 'status'];
    protected $casts = ['tgl_pengaduan' => 'date'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function tanggapan(): HasMany
    {
        return $this->hasMany(Tanggapan::class);
    }
}
