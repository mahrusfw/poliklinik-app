<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

// Impor model yang dibutuhkan untuk relasi Eloquent
use App\Models\Poli;
use App\Models\JadwalPeriksa;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',     // Diubah dari 'nama' agar sesuai standar Laravel
        'alamat',
        'no_ktp',
        'no_hp',
        'no_rm',    // Nomor Rekam Medis untuk pasien
        'role',
        'id_poli',  // Foreign key untuk dokter
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed', // Otomatis hash password saat dibuat/diupdate
        ];
    }

    /**
     * Relasi: Seorang User (Dokter) dimiliki oleh satu Poli.
     */
    public function poli()
    {
        return $this->belongsTo(Poli::class, 'id_poli');
    }

    /**
     * Relasi: Seorang User (Dokter) memiliki banyak Jadwal Periksa.
     */
    public function jadwalPeriksa()
    {
        return $this->hasMany(JadwalPeriksa::class, 'id_dokter');
    }

    /**
     * Accessor for legacy 'nama' attribute used in views.
     * Allows $user->nama to return the 'name' column.
     */
    public function getNamaAttribute()
    {
        return $this->attributes['name'] ?? null;
    }

    /**
     * Mutator so assigning to $user->nama sets the 'name' column.
     */
    public function setNamaAttribute($value)
    {
        $this->attributes['name'] = $value;
    }

    /**
     * Ensure a 'name' exists before creating the model.
     * Fallbacks: use 'nama' (if provided) or extract from email local-part.
     */
    protected static function booted()
    {
        static::creating(function ($user) {
            if (empty($user->name)) {
                if (!empty($user->attributes['nama'])) {
                    $user->name = $user->attributes['nama'];
                } elseif (!empty($user->email)) {
                    $user->name = strstr($user->email, '@', true) ?: $user->email;
                }
            }
        });
    }
}
