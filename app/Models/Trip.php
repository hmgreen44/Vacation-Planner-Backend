<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Trip extends Model
{
    use HasFactory;
    protected $table = 'trips';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;
    protected $fillable = [
      'name', 'city', 'state', 'start_date', 'end_date', 'organizer', 'trip_token'];
     public function Organizer()
    {
        return $this->belongsTo(User::class, 'organizer', 'id');
    }
     public function expenses(){
        return $this->hasMany(Expense::class);
     }
}



