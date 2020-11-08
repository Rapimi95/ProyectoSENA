@extends('layouts.main')

@section('title')
    Usuarios
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
            <div class="col-6">
                <div class="form-group">
                    <label for="">Categoría</label>
                    <input type="text" class="form-control">
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <div class="form-group m-0">
                    <label for="">Descripción</label>
                    <textarea name="" id="" cols="30" rows="10" class="form-control"></textarea>
                </div>
            </div>
        </div>
    </form>
@endsection