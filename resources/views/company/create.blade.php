@extends('layouts.tallycompanyreg')
@section('title', 'Tally - Registrar empresa')
@section('content')
<h1>Registrar una empresa</h1>

<form action="{{ route('company.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group row">
        <label for="companyname">Nombre de la empresa</label>
        <input type="text" class="form-control" id="companyname" name="companyname" placeholder="Nombre de la empresa" value="{{ old('companyname') }}">
        @error('companyname')
            <small class="messagevalidation">*{{ $message }}</small>
        @enderror
    </div>
    <div class="form-group row">
        <label for="companybs">Giro de la empresa</label>
        <input type="text" class="form-control" id="companybs" name="companybs" placeholder="Giro de la empresa" value="{{ old('companybs') }}">
    </div>
    <div class="form-group row">
        <label for="website">Sitio WEB de la empresa</label>
        <input type="text" class="form-control" id="website" name="website" placeholder="Sitio WEB" value="{{ old('website') }}">
    </div>
    <label>Datos del socio solicitante</label>
    <div class="form-group row">
        <label for="firstname">Nombre del socio</label>
        <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Nombre" value="{{ old('firstname') }}">
        @error('firstname')
            <small class="messagevalidation">*{{ $message }}</small>
        @enderror
    </div>
    <div class="form-group row">
        <label for="lastname">Apellidos</label>
        <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Apellidos" value="{{ old('lastname') }}">
        @error('lastname')
            <small class="messagevalidation">*{{ $message }}</small>
        @enderror
    </div>
    <div class="form-group row">
        <label for="email">Dirección de Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="contacto@email.com" value="{{ old('email') }}">
    </div>
    <div class="form-group row">
        <label for="phonenumber">Número de teléfono</label>
        <input type="text" class="form-control" id="phonenumber" name="phonenumber" placeholder="XXXXXXXX" value="{{ old('phonenumber') }}">
        @error('phonenumber')
            <small class="messagevalidation">*{{ $message }}</small>
        @enderror
    </div>
    <div class="form-group row">
        <label for="address">Dirección</label>
        <textarea type="text" class="form-control" id="address" name="address" placeholder="Dirección">{{ old('address') }}</textarea>
    </div>

    <br>
    <button type="submit" class="btn btn-success">Registrar</button>
</form>

@endsection
