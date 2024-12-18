<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory;
    use SoftDeletes;
//    protected $keyType = 'string';
//    public $incrementing = false;
    protected $fillable = [
        'title',
        'description',
        'project_id',
    ];


    public function project()
    {

        return $this->belongsTo(Project::class);
    }
//    protected static function boot()
//    {
//        parent::boot();
//
//        static::creating(function ($task) {
//            $task->id = (string) Str::uuid();
//        });
//    }

}
