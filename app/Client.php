<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Client
 * @mixin \Eloquent
 */
class Client extends Model
{
    // constantes
    const MARITAL_STATUS = [
        1 => 'Solteiro',
        2 => 'Casado',
        3 => 'Divorciado'
    ];

    const TYPE_INDIVIDUAL = 'individual';
    const TYPE_LEGAL = 'legal';

    // mas assignment
    protected $fillable = [
        'name',
        'document_number',
        'email',
        'phone',
        'defaulter',
        'date_birth',
        'sex',
        'marital_status',
        'physical_disability',
        'company_name',
        'client_type'
    ];

    public static function getClientType($type)
    {
        return $type == Client::TYPE_LEGAL ? $type : Client::TYPE_INDIVIDUAL;
    }
}
