{{ Form::hidden('client_type', $clientType) }}

@component('form._form_group',['field'=>'name'])
    {{ Form::label('name','Nome',['class'=>'control-label']) }}
    {{ Form::text('name',null,['class'=>'form-control']) }}
@endcomponent

@component('form._form_group',['field'=>'document_number'])
    {{ Form::label('document_number','Documento') }}
    {{ Form::email('document_number',null,['class'=>'form-control']) }}
@endcomponent

@component('form._form_group',['field'=>'email'])
    {{ Form::label('email','E-mail') }}
    {{ Form::text('email',null,['class'=>'form-control']) }}
@endcomponent

@component('form._form_group',['field'=>'phone'])
    {{ Form::label('phone','Telefone') }}
    {{ Form::text('phone',null,['class'=>'form-control']) }}
@endcomponent

@if($clientType == \App\Client::TYPE_INDIVIDUAL)
    @component('form._form_group',['field'=>'marital_status'])
        {{ Form::label('marital_status','Estado Civil') }}
        {{ Form::select(
            'marital_status',
            [
                '' => 'Selecione',
                1 => 'Solteiro',
                2 => 'Casado',
                3 => 'Divorciado'
            ],
            null,
            ['class'=>'form-control']
        ) }}
    @endcomponent

    @component('form._form_group',['field'=>'date_birth'])
        {{ Form::label('date_birth','Data de Nascimento') }}
        {{ Form::date('date_birth',null,['class'=>'form-control']) }}
    @endcomponent

    <div class="radio {{$errors->has('sex')?'has-error':''}}">
        <label>
            {{ Form::radio('sex','m') }} Masculino
        </label>
    </div>
    <div class="radio {{$errors->has('sex')?' has-error':''}}">
        <label>
            {{ Form::radio('sex','f') }} Feminino
        </label>
    </div>
    <div class="{{$errors->has('sex')?' has-error':''}}">
        @include('form._help_block',['field' => 'sex'])
    </div>

    @component('form._form_group',['field'=>'physical_disability'])
        {{ Form::label('physical_disability','Deficiência Física') }}
        {{ Form::text('physical_disability',null,['class'=>'form-control']) }}
    @endcomponent

@else

    @component('form._form_group',['field'=>'companyy_name'])
        {{ Form::label('company_name','Nome Fantasia') }}
        {{ Form::text('company_name',null,['class'=>'form-control']) }}
    @endcomponent

@endif

<div class="checkbox">
    <label>
        {{ Form::checkbox('defaulter')}} Inadimplente?
    </label>
</div>

<button type="submit" class="btn btn-primary">Salvar</button>
