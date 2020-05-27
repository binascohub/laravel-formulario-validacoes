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

    // mutator acess
    public static function getClientType($type)
    {
        return $type == Client::TYPE_LEGAL ? $type : Client::TYPE_INDIVIDUAL;
    }

    public function getSexFormattedAttribute()
    {
        if ($this->client_type == self::TYPE_INDIVIDUAL) {
            return $this->sex == 'm' ? 'Masculino' : 'Feminino';
        }
        return '';
    }

    public function getDateBirthFormattedAttribute()
    {
        return (new \DateTime($this->date_birth))->format('d/m/Y');
    }

    public function getDocumentNumberFormattedAttribute()
    {
        $document = $this->document_number;
        if(!empty($document)){
            if(strlen($document)==11){
                $document = preg_replace(
                    '/(\d{3})(\d{3})(\d{3})(\d{2})/',
                    '$1.$2.$3-$4',
                    $document
                );
            }elseif(strlen($document)==14){
                $document = preg_replace(
                    '/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/',
                    '$1.$2.$3/$4-$5',
                    $document
                );
            }
        }
        return $document;
    }

    // mutator atribute
    public function setDocumentNumberAttribute($value)
    {
        $this->attributes['document_number'] = preg_replace('/[^0-9]/','',$value);
    }



}
