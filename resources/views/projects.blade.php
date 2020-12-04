@extends('layouts.main')

@section('title')
    Proyectos
@endsection

@section('list')
    <div class="list-group list-group-flush border-bottom">
        @foreach ($projects as $project)
            <button 
                onClick="showProject({{ $project->id }})"
                class="btn-list-item list-group-item list-group-item-action">
                <div>{{ $project->name }}</div>
                <small class="text-primary">{{ $project->category }}</small>
            </button>
        @endforeach
    </div>
@endsection

@section('form')
    <form action="#" method="post">
        @csrf
        
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

@section('bottom-button')
    <button id="btn-upload" class="btn btn-primary mt-4 d-flex">
        <span class="material-icons mr-2">
            backup
        </span>
        Cargar archivos
    </button>

    <form action="/file" method="POST">
        <input id="btn-upload-hidden" type="file" class="d-none" name="" id="">
    </form>
@endsection

@section('scripts')
    <script>
        const projects = @json($projects);

        function showProject(id) {
            const project = projects.find(item => item.id == id);

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
        }

        $('#btn-upload').click(function() {
            $('#btn-upload-hidden').click();
        });
    </script>
@endsection