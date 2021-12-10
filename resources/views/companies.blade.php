@extends('layouts.tallycompanyreg')
@section('title', 'Tally - Empresas registradas')
@section('content')
    <h1>Empresas</h1>

    <a href="{{ route('company.create') }}">
        <button type="button" class="btn btn-primary">
            Agregar una nueva empresa
        </button>
    </a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nombre de la empresa y giro</th>
                <th>Socio solicitante</th>
                <th>Domicilio</th>
                <th colspan="2">Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($companies as $row)
                <tr>
                    <td>
                        <a href="{{ route('company.show', $row->company_id) }}" >
                            {{ $row->companyname }}
                        </a>
                        <br>
                        Giro: {{ $row->companybs }}
                        <br>
                        WEB: {{ $row->website }}
                    </td>
                    <td>
                        {{ $row->lastname }}, {{ $row->firstname }}
                        <br>
                        Tel: {{ $row->phonenumber }}
                        <br>
                        Email: {{ $row->email }}
                    </td>
                    <td>
                        {{ $row->address }}
                    </td>
                    <td>
                        <a href="{{ route('company.edit', $row->company_id) }}" >
                            <button type="button" class="btn btn-primary">
                                Editar
                            </button>
                        </a>
                    </td>
                    <td>
                        <form action="{{ route('company.destroy', $row->company_id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-primary">
                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $companies->links() }}
@endsection
