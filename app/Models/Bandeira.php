<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Bandeira extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = ['nome', 'grupo_economico_id'];

    // protected static $logAttributes = ['*'];
    // protected static $logOnlyDirty = true;

    public function grupoEconomico()
    {
        return $this->belongsTo(GrupoEconomico::class);
    }

    public function unidades()
    {
        return $this->hasMany(Unidade::class);
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['nome', 'grupo_economico_id'])
            ->logOnlyDirty()
            ->setDescriptionForEvent(fn(string $eventName) => "Bandeira {$eventName}");
    }
}
