<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $fillable = [
        'client',
        'quality_rating',
        'time_of_treatment',
        'comportment',
        'comments',
    ]; // Use the 'feedback' table
}
