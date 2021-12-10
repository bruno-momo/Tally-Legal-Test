@extends('layouts.tallycompanyreg')
@section('title', 'Tally - Editar empresa')
@section('content')
<h1>Editar empresa</h1>

<form action="{{ route('company.update', $company->company_id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="form-group row">
        <label for="companyname">Nombre de la empresa</label>
        <input type="text" class="form-control" id="companyname" name="companyname" value="{{ old('companyname', $company->companyname) }}">
        @error('companyname')
            <small class="messagevalidation">*{{ $message }}</small>
        @enderror
    </div>
    <div class="form-group row">
        <label for="companybs">Giro de la empresa</label>
        <input type="text" class="form-control" id="companybs" name="companybs" value="{{ old('companybs', $company->companybs) }}">
    </div>
    <div class="form-group row">
        <label for="website">Sitio WEB de la empresa</label>
        <input type="text" class="form-control" id="website" name="website" value="{{ old('website', $company->website) }}">
    </div>
    <label>Datos del socio solicitante</label>
    <div class="form-group row">
        <label for="firstname">Nombre del socio</label>
        <input type="text" class="form-control" id="firstname" name="firstname" value="{{ old('firstname', $company->firstname) }}">
        @error('firstname')
            <small class="messagevalidation">*{{ $message }}</small>
        @enderror
    </div>
    <div class="form-group row">
        <label for="lastname">Apellidos</label>
        <input type="text" class="form-control" id="lastname" name="lastname" value="{{ old('lastname', $company->lastname) }}">
        @error('lastname')
            <small class="messagevalidation">*{{ $message }}</small>
        @enderror
    </div>
    <div class="form-group row">
        <label for="email">Dirección de Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="contacto@email.com" value="{{ old('email', $company->email) }}">
    </div>
    <div class="form-group row">
        <label for="phonenumber">Número de teléfono</label>
        <input type="text" class="form-control" id="phonenumber" name="phonenumber" placeholder="XXXXXXXX" value="{{ old('phonenumber', $company->phonenumber) }}">
        @error('phonenumber')
            <small class="messagevalidation">*{{ $message }}</small>
        @enderror
    </div>
    <div class="form-group row">
        <label for="address">Dirección</label>
        <textarea type="text" class="form-control" id="address" name="address" placeholder="Dirección">{{ old('address', $company->address) }}</textarea>
    </div>

    <br>
    <button type="submit" class="btn btn-success">Actualizar empresa</button>
</form>

@endsection
