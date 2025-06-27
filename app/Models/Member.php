<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'member';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'npm';

    /**
     * Indicates if the model's ID is auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The "type" of the primary key ID.
     *
     * @var string
     */
    protected $keyType = 'int';

    /**
     * PERBAIKAN: Beritahu Laravel bahwa tabel ini tidak memiliki kolom timestamps.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'npm',
        'nama',
        'quotes',
        'photo', // Path untuk foto profil
        'qr',    // Path untuk kode QR
        'role',
    ];
}
