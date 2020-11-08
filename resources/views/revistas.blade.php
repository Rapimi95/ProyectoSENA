@extends('layouts.main')

@section('title')
    Revistas
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
                    <label for="">Categoria</label>
                    <input type="text" class="form-control">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="">clasificacion</label>
                    <input type="text" class="form-control">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="">Codigo</label>
                    <input type="text" class="form-control">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="">Tematica</label>
                    <input type="text" class="form-control">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="">Formato</label>
                    <input type="text" class="form-control">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="">Institucion</label>
                    <input type="text" class="form-control">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="">Ciudad</label>
                    <input type="text" class="form-control">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="">Pais</label>
                    <input type="text" class="form-control">
                </div>
            </div>
        </div>
    </form>
@endsection
