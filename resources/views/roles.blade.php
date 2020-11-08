@extends('layouts.main')

@section('title')
    Roles
@endsection

@section('list')
    <ul>
        <li>Proyecto prueba 0</li>
        <li>Proyecto prueba 1</li>
        <li>Proyecto prueba 2</li>
        <li>Proyecto prueba 3</li>
        <li>Proyecto prueba 4</li>
    </ul>
@endsection

@section('form')
    <form action="#">
        <div class="form-row">
            <div class="col-6">
                <div class="form-group">
                    <label for="">Nombre</label>
                    <input type="text" class="form-control">
                </div>
            </div>
        </div>

    </form>
@endsection
