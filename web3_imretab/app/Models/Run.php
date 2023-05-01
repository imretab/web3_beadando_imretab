<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Run extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'uploader',
        'run_category',
        'run_title',
        'time',
        'youtube_link',
        'comment_onrun',
        'uploaded_at',
        'isAccepted'
    ];
}
