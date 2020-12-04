@extends('layouts.main')

@section('title')
    Usuarios
@endsection

@section('form')
    <form action="#">
        <div class="form-row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Nombre</label>
                    <input type="text" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Contraseña</label>
                    <input type="text" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Rol</label>
                    <input type="text" class="form-control">
                </div>
            </div>
        </div>
    </form>
@endsection