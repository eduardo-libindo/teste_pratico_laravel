<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Unidade extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = ['nome_fantasia', 'razao_social', 'cnpj', 'bandeira_id'];

    // protected static $logAttributes = ['*'];
    // protected static $logOnlyDirty = true;

    public function bandeira()
    {
        return $this->belongsTo(Bandeira::class);
    }

    public function colaboradors()
    {
        return $this->hasMany(Colaborador::class);
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['nome_fantasia', 'razao_social', 'cnpj', 'bandeira_id'])
            ->logOnlyDirty()
            ->setDescriptionForEvent(fn(string $eventName) => "Unidade {$eventName}");
    }
}
