<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Employee extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Departement_id',
        'Position_id',
        'name',
        'email',
        'joined',
        'status',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'Departement_id' => 'integer',
        'Position_id' => 'integer',
        'joined' => 'date',
    ];

    public function leaverequests(): HasMany
    {
        return $this->hasMany(Leaverequest::class);
    }

    public function sallaries(): HasMany
    {
        return $this->hasMany(Sallary::class);
    }

    public function departement(): BelongsTo
    {
        return $this->belongsTo(Departement::class);
    }

    public function position(): BelongsTo
    {
        return $this->belongsTo(Position::class);
    }
}
