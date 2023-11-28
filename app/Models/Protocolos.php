<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Protocolos extends Model
{
    use HasFactory;
    protected $primaryKey = 'Protocolo';
    public $incrementing = false; // Desative a autoincrementação, pois não há uma coluna 'id'
    protected $fillable = [ 
        'Id',
        'Protocolo',
        'ProtocoloFlag',
        'N_de_identificacao',
        'caminho_arquivo'
    ];

    public function cadastro()
    {
        return $this->belongsTo(Cadastro::class, 'N_de_cadastro', 'N_de_identificacao');
    }
}
