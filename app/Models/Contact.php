<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
        'name',
        'phone',
        'email',
        'created_by_user_id',
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by_user_id');
    }
}
