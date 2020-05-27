{{ csrf_field() }}

<input type="hidden" name="client_type" value="{{$clientType}}" />

<div class="form-group">
    {{ Form::label('name','Nome') }}
    {{ Form::text('name',null,['class'=>'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('document_number','Documento') }}
    {{ Form::email('document_number',null,['class'=>'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('email','E-mail') }}
    {{ Form::text('email',null,['class'=>'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('phone','Telefone') }}
    {{ Form::text('phone',null,['class'=>'form-control']) }}
</div>

@if($clientType == \App\Client::TYPE_INDIVIDUAL)
    <div class="form-group">
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
    </div>

    <div class="form-group">
        {{ Form::label('date_birth','Data de Nascimento') }}
        {{ Form::date('date_birth',null,['class'=>'form-control']) }}
    </div>

    <div class="radio">
        <label>
            {{ Form::radio('sex','m') }} Masculino
        </label>
    </div>

    <div class="radio">
        <label>
            {{ Form::radio('sex','f') }} Feminino
        </label>
    </div>

    <div class="form-group">
        {{ Form::label('physical_disability','Deficiência Física') }}
        {{ Form::text('physical_disability',null,['class'=>'form-control']) }}
    </div>

@else

    <div class="form-group">
        {{ Form::label('company_name','Nome Fantasia') }}
        {{ Form::text('company_name',null,['class'=>'form-control']) }}
        <small id="helpId" class="text-muted">Não é a Razão Social</small>
    </div>

@endif

<div class="checkbox">
    <label>
        {{ Form::checkbox('defaulter')}} Inadimplente?
    </label>
</div>

<button type="submit" class="btn btn-primary">Salvar</button>
