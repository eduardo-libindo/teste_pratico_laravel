<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class GrupoEconomico extends Model
{
    use HasFactory, LogsActivity;

    protected $table = 'grupo_economicos';
    protected $fillable = ['nome'];

    // protected static $logAttributes = ['*'];
    // protected static $logOnlyDirty = true;

    public $incrementing = false;
    protected $keyType = 'string';

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['nome'])
        ->logOnlyDirty()
        ->setDescriptionForEvent(fn(string $eventName) => "Grupo Economico {$eventName}");
    }

    public function bandeiras()
    {
        return $this->hasMany(Bandeira::class);
    }
}
