<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Tareas extends Model
{
    use HasFactory;
    use LogsActivity;

    protected static $logAttributes = ['*'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logFillable();
    }

    public function subtasks() {
        return $this->hasMany(SubTask::class, 'task_id');
    }

    protected static function boot()
{
    parent::boot();

    static::deleting(function ($tarea) {
        $tarea->subtasks()->delete();
    });
}
}
