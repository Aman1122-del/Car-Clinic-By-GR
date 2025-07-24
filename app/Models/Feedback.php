<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'comment'];

    // Add this line to explicitly set the correct table name
    protected $table = 'feedbacks';
}
