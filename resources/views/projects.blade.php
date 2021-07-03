@extends('layouts.main')

@section('title')
    Proyectos
@endsection

@section('list')
    <div id="sidebar-list" class="list-group list-group-flush border-bottom">
        @foreach ($projects as $project)
            <button 
                onClick="showProject({{ $project->id }})"
                class="btn-list-item list-group-item list-group-item-action">
                <div>{{ $project->name }}</div>
                <small class="text-primary">{{ $project->category }}</small>
            </button>
        @endforeach
    </div>
    
    <div class="mt-4 d-flex justify-content-center">
        {!! $projects->render() !!}
    </div>
@endsection

@section('form')
    <form action="#" method="post">
        @csrf
        
        <h3 class="mb-4">Datos del proyecto</h3>

        <div class="form-row">
            <div class="col-6">
                <div class="form-group">
                    <label for="">Nombre</label>
                    <input type="text" name="name" class="form-control" disabled>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="">Categoría</label>
                    <input type="text" name="category" class="form-control" disabled>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <div class="form-group m-0">
                    <label for="">Descripción</label>
                    <textarea name="description" cols="30" rows="10" class="form-control" disabled></textarea>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('bottom-section')
    <div class="card mt-4 related-info">
        <div class="card-body">
            <h3 class="mb-4">Articulos fuente</h3>

            <ul class="list-group">
                <a href="" class="list-group-item list-group-item-action">Artículo fuente 1</a>
                <a href="" class="list-group-item list-group-item-action">Artículo fuente 2</a>
                <a href="" class="list-group-item list-group-item-action">Artículo fuente 3</a>
                <a href="" class="list-group-item list-group-item-action">Artículo fuente 4</a>
            </ul>
        </div>
    </div>

    <div class="card mt-4 related-info">
        <div class="card-body">
            <h3 class="mb-4">Articulos resultantes</h3>

            <ul class="list-group">
                <a href="" class="list-group-item list-group-item-action">Artículo resultante 1</a>
                <a href="" class="list-group-item list-group-item-action">Artículo resultante 2</a>
                <a href="" class="list-group-item list-group-item-action">Artículo resultante 3</a>
                <a href="" class="list-group-item list-group-item-action">Artículo resultante 4</a>
            </ul>
        </div>
    </div>
    
    <div class="card mt-4 related-info">
        <div class="card-body">
            <h3 class="mb-4">Archivos adjuntos</h3>

            <ul class="list-group">
                <a href="" class="list-group-item list-group-item-action">Archivo adjunto 1</a>
                <a href="" class="list-group-item list-group-item-action">Archivo adjunto 2</a>
                <a href="" class="list-group-item list-group-item-action">Archivo adjunto 3</a>
                <a href="" class="list-group-item list-group-item-action">Archivo adjunto 4</a>
            </ul>

            <div class="d-flex justify-content-end">
                <button id="btn-upload" class="btn btn-primary mt-4 d-flex">
                    <span class="material-icons mr-2">
                        backup
                    </span>
                    Cargar archivo
                </button>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $('#btn-create, #btn-edit').click(function() {
            $('.related-info').hide();
        });

        function showProject(id) {
            $('.related-info').show();

            $.get(`/ajax/find/proyectos/${id}`, function(data) {
                const project = data;
            
                $('#main-section').show();

                $('#action-buttons .btn').hide();
                $('#main-section #btn-edit').show();
                $('#main-section #btn-delete').show();

                $('#main-section form .form-control').attr('disabled', true);
                
                $('#main-section form').attr('action', `/proyectos/${project.id}`);
                $('#main-section form').attr('method', 'post');

                $('#btn-delete').closest('form').attr('action', `/proyectos/${project.id}`);

                $('#main-section form').prepend('<input type="hidden" name="_method" value="put">');

                $('#main-section form [name="id"]').val(project.id);
                $('#main-section form [name="name"]').val(project.name);
                $('#main-section form [name="category"]').val(project.category);
                $('#main-section form [name="description"]').val(project.description);
            });
        }

        function fillList(data) {
            let html = '';

            data.forEach(element => {
                html += `
                    <button 
                        onClick="showProject(${ element.id })"
                        class="btn-list-item list-group-item list-group-item-action">
                        <div>${ element.name }</div>
                        <small class="text-primary">${ element.category }</small>
                    </button>
                `
            });

            $('#sidebar-list').html(html);
        }
    </script>
@endsection