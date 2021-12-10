@extends('layouts.tallycompanyreg')
@section('title', 'Tally - Empresa '.$company->companyname)
@section('content')
<p>Empresa:</p>
<h2>{{ $company->companyname }}</h2>

<p>Giro: {{ $company->companybs }}</p>
<p>Sitio WEB: {{ $company->website }}</p>

<label>Datos del socio solicitante</label>
<p> Nombre: {{ $company->lastname }}, {{ $company->firstname }}</p>
<p> Email: {{ $company->email }}</p>
<p> Tel: {{ $company->phonenumber }}</p>
<p> Dirección: {{ $company->address }}</p>
<br>
<a href="{{ route('company.edit', $company->id) }}" >
    <button type="button" class="btn btn-primary">
        Editar
    </button>
</a>

@endsection
