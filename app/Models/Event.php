<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $guarded = [
        'created_at', 'updated_at'
    ];
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'artist_id',
        'name',
        'venue',
        'limit',
        'event_date'
    ];

    public function artist()
    {
        return $this->belongsTo(Artist::class);
    }
}
