@extends('layouts.app')

@section('content')
<main class="container-fluid py-4">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="row mb-4">
                <div class="col">
                    <h1 class="text-white text-center">Gestionar recursos</h1>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-4">
                    <a href="/proyectos" class="text-decoration-none">
                        <div class="card">
                            <div class="card-body">
                                <div class="text-center">
                                    <span class="material-icons text-primary h1">folder</span>
                                </div>
                                <h3 class="text-dark text-center m-0">
                                    Proyectos
                                </h3>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 mb-4">
                    <a href="/articulos" class="text-decoration-none">
                        <div class="card">
                            <div class="card-body">
                                <div class="text-center">
                                    <span class="material-icons text-primary h1">article</span>
                                </div>
                                <h3 class="text-dark text-center m-0">
                                    Artículos fuente
                                </h3>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 mb-4">
                    <a href="/articulos" class="text-decoration-none">
                        <div class="card">
                            <div class="card-body">
                                <div class="text-center">
                                    <span class="material-icons text-primary h1">done_outline</span>
                                </div>
                                <h3 class="text-dark text-center m-0">
                                    Artículos resultantes
                                </h3>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 mb-4">
                    <a href="/revistas" class="text-decoration-none">
                        <div class="card">
                            <div class="card-body">
                                <div class="text-center">
                                    <span class="material-icons text-primary h1">menu_book</span>
                                </div>
                                <h3 class="text-dark text-center m-0">
                                    Revistas
                                </h3>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 mb-4">
                    <a href="/revistas" class="text-decoration-none">
                        <div class="card">
                            <div class="card-body">
                                <div class="text-center">
                                    <span class="material-icons text-primary h1">event</span>
                                </div>
                                <h3 class="text-dark text-center m-0">
                                    Eventos de divulgación
                                </h3>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 mb-4">
                    <a href="/usuarios" class="text-decoration-none">
                        <div class="card">
                            <div class="card-body">
                                <div class="text-center">
                                    <span class="material-icons text-primary h1">people</span>
                                </div>
                                <h3 class="text-dark text-center m-0">
                                    Usuarios
                                </h3>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
