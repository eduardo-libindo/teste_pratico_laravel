<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Colaborador extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = ['nome', 'email', 'cpf', 'unidade_id'];

    // protected static $logAttributes = ['*'];
    // protected static $logOnlyDirty = true;

    public function unidade()
    {
        return $this->belongsTo(Unidade::class);
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['nome', 'email', 'cpf', 'unidade_id'])
            ->logOnlyDirty()
            ->setDescriptionForEvent(fn(string $eventName) => "Colaborador {$eventName}");
    }
}
