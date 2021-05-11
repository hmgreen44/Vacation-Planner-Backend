<?php

namespace App\Models;
use App\Models\Trip;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;
    protected $table = 'expenses';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;
    protected $fillable = [
        'name', 'cost', "trip_id", "user_id"
    ];
     public function trip(){
        return $this->belongsTo(Trip::class);
     }
     public function user(){
        return $this->belongsTo(User::class);
     }


}
