<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;
    protected $fillable = [
        'originalus_pavadinimas',
        'koduotas_pavadinimas',
        'rodomas_pavadinimas',
        'path'
    ];
    
    public function setFilenamesAttribute($value)
    {
        $this->attributes['koduotas_pavadinimas'] = json_encode($value);
    }
}