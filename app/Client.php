<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Client
 *
 * @property int $id
 * @property string $name
 * @property string $document_number
 * @property string $email
 * @property string $phone
 * @property bool $defaulter
 * @property string|null $date_birth
 * @property string|null $sex
 * @property string|null $marital_status
 * @property string|null $physical_disability
 * @property string|null $company_name
 * @property string $client_type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Client newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Client newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Client query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Client whereClientType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Client whereCompanyName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Client whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Client whereDateBirth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Client whereDefaulter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Client whereDocumentNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Client whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Client whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Client whereMaritalStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Client whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Client wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Client wherePhysicalDisability($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Client whereSex($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Client whereUpdatedAt($value)
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
