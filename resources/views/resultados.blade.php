@extends('layouts.main')

@section('title')
    Resultados
@endsection

@section('form')
    <form action="#">
        <div class="form-row">
            <div class="col-6">
                <div class="form-group">
                    <label for="">Articulo</label>
                    <input type="text" class="form-control">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="">Proyecto</label>
                    <input type="text" class="form-control">
                </div>
            </div>
        </div>
    </form>
@endsection
