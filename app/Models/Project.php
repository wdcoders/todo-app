<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'status',
        'created_at',
        'updated_at',
        'updated_by'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
