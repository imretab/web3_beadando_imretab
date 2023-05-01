<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;

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
    public function runCategory(): HasOne{
        return $this->hasOne(Category::class,'id','run_category');
    }
    public function uploaderName() : HasOne{
        return $this->hasOne(User::class,'id','uploader');
    }
}
