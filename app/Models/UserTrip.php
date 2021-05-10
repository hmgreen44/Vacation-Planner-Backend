<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTrip extends Model
{
    use HasFactory;
    protected $table = 'user_trips';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;
    protected $fillable = [
      'user_id', 'trip_id',
];
   public function user()
    {
        return $this->hasMany(Trip::class);
    }
   public function trip()
    {
        return $this->belongsTo(User::class);
    }
}

