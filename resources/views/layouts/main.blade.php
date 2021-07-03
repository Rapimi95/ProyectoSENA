@extends('layouts.app')

@section('content')  
<div class="container-fluid h-100">
    <div class="row h-100">
        <div class="col-3 p-0 bg-white pt-4">
            <div id="list-section">
                <div class="container-fluid">
                    <div class="row title mb-4">
                        <div class="col">
                            <h2 class="m-0 text-dark"> @yield('title') </h2>
                        </div>
                        <div class="col-auto">
                            <button id="btn-create" class="btn button-rounded">
                                <span class="material-icons">add</span>
                            </button>
                        </div>
                    </div>

                    <div class="row border-bottom">
                        <div class="col">
                            <form id="search-form">
                                <div class="input-group search-bar mb-4">
                                    <input type="text" id="input-search" class="form-control" placeholder="Buscar...">
                                    <div class="input-group-append">
                                        <button id="btn-search" class="input-group-text">
                                            <span class="material-icons">search</span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col p-0">
                            @yield('list')
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-9 pt-4">
            <div class="container mb-5">
                <div id="main-section">
                    <div id="action-buttons">
                        <button id="btn-store" class="ml-3 btn button-rounded">
                            <span class="material-icons">save</span>
                        </button>
                        <button id="btn-edit" class="ml-3 btn button-rounded">
                            <span class="material-icons">edit</span>
                        </button>
                        <button id="btn-cancel-create" class="ml-3 btn button-rounded">
                            <span class="material-icons">close</span>
                        </button>
                        <button id="btn-cancel-edit" class="ml-3 btn button-rounded">
                            <span class="material-icons">close</span>
                        </button>
                        <form action="" method="POST">
                            @csrf
                            @method('delete')

                            <button type="submit" id="btn-delete" class="col-auto ml-3 btn button-rounded">
                                <span class="material-icons">delete</span>
                            </button>
                        </form>
                    </div>
                    
                    <div class="card">
                        <div class="card-body">
                            @yield('form')
                        </div>
                    </div>

                    @yield('bottom-section')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection