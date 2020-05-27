<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Client;

class ClientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $clientType = Client::getClientType($this->get('client_type'));
        $documentNumberType = $clientType == Client::TYPE_INDIVIDUAL ? 'cpf' : 'cnpj';
        $client = $this->route('client');
        $clientId = $client instanceof Client ? $client->id : 0;

        $rules = [
            'name' => 'required|max:255',
            'document_number' => "required|unique:clients,document_number,$clientId|document_number:$documentNumberType",
            'email' => 'required|email',
            'phone' => 'required',
        ];

        $marital_status = implode( ',', array_keys(Client::MARITAL_STATUS) );
        $rulesIndividual = [
            'date_birth' => 'required|date',
            'marital_status' => "required|in:$marital_status",
            'sex' => 'required|in:m,f',
            'physical_disability' => 'max:255'
        ];

        $rulesLegal = [
            'company_name' => 'required|max:255'
        ];

        if ($clientType == Client::TYPE_INDIVIDUAL){
            $clientType = $rules + $rulesIndividual;
        } else {
            $clientType = $rules + $rulesLegal;
        }

        return $clientType;
    }
}
