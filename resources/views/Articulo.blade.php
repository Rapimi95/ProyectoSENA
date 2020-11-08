@extends('layouts.main')

@section('title')
    Articulo
@endsection

@section('form')
    <form action="#">
        <div class="form-row">
            <div class="col-6">
                <div class="form-group">
                    <label for="">Tema</label>
                    <input type="text" class="form-control">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                <label for="">Titulo</label>
                    <input type="text" class="form-control">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="">url</label>
                    <input type="url" class="form-control">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="">Autor</label>
                    <input type="text" class="form-control">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="">Estado</label>
                    <input type="text" class="form-control">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="">Tipo</label>
                    <input type="text" class="form-control">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="">Contenido</label>
                    <input type="text" class="form-control">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="">Año</label>
                    <input type="date" class="form-control">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="">Pais</label>
                    <input type="text" class="form-control">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="">Resultado</label>
                    <input type="text" class="form-control">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="">Resumen</label>
                    <input type="text" class="form-control">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="">Clasificacion</label>
                    <input type="text" class="form-control">
                </div>
            </div>
        </div>
    </form>
@endsection
