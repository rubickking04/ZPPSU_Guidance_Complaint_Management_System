<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Complains extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'department',
        'category',
        'course_and_section',
        'body',
        'image',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public $sortable = [
        'department',
        'category',
        'created_at',
        'updated_at',
    ];
    protected $dates = [
        'deleted_at',
    ];
}