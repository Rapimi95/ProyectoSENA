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
    <form id="main-form" action="#" method="POST">
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
            <h3 class="mb-4">Artículos fuente</h3>

            <ul id="sourceArticles" class="list-group"></ul>

            <form action="/proyectos/relacionar/articulo-fuente" method="POST">
                <div class="form-row mt-4">
                    @csrf

                    <input type="text" name="projectId" hidden>

                    <div class="col-12">
                        <label for="">Seleccionar artículo fuente</label>
                    </div>

                    <div class="col">
                        <select id="sourceArticleSelect" name="sourceArticleId" class="js-states form-control">
                            @foreach($sourceArticles as $sourceArticle)
                            <option value="{{ $sourceArticle->id }}">{{ $sourceArticle->title }}</option> 
                            @endforeach
                        </select>
                    </div>
                
                    <div class="col-auto">
                        <button class="btn btn-primary d-flex">
                            <span class="material-icons mr-2">
                                add_link
                            </span>
                            Vincular
                        </button>
                    </div>
                    
                    <div class="col-auto">
                        <a href="/articulos-fuente" class="btn btn-primary d-flex">
                            <span class="material-icons mr-2">
                                add
                            </span>
                            Crear
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="card mt-4 related-info">
        <div class="card-body">
            <h3 class="mb-4">Artículos resultantes</h3>

            <ul id="resultingArticles" class="list-group"></ul>

            <form action="proyectos/relacionar/articulo-resultante" method="POST">
                @csrf

                <input type="text" name="projectId" value="" hidden>

                <div class="form-row mt-4">
                    <div class="col-12">
                        <label for="">Seleccionar artículo resultante</label>
                    </div>

                    <div class="col">
                        <select id="resultingArticleSelect" name="resultingArticleId" class="form-control">
                            @foreach($resultingArticles as $resultingArticle)
                                <option value="{{ $resultingArticle->id }}">{{ $resultingArticle->title }}</option> 
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="col-auto">
                        <button class="btn btn-primary d-flex">
                            <span class="material-icons mr-2">
                                add_link
                            </span>
                            Vincular
                        </button>
                    </div>

                    <div class="col-auto">
                        <a href="/articulos-resultantes" class="btn btn-primary d-flex">
                            <span class="material-icons mr-2">
                                add
                            </span>
                            Crear
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="card mt-4 related-info">
        <div class="card-body">
            <h3 class="mb-4">Archivos adjuntos</h3>

            <ul class="list-group"></ul>

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
        module = 'proyectos';

        $('#btn-create, #btn-edit').click(function() {
            $('.related-info').hide();
        });

        function showProject(id) {
            $('.related-info').show();

            $.get(`/ajax/find/proyectos/${id}`, function(data) {
                const project = data.project;
                const sourceArticles = data.sourceArticles;
                const resultingArticles = data.resultingArticles;
            
                $('#main-section').show();

                $('#action-buttons .btn').hide();
                $('#main-section #btn-edit').show();
                $('#main-section #btn-delete').show();

                $('#main-section #main-form .form-control').attr('disabled', true);
                
                $('#main-section #main-form').attr('action', `/proyectos/${project.id}`);
                $('#main-section #main-form').attr('method', 'post');

                $('#btn-delete').closest('form').attr('action', `/proyectos/${project.id}`);

                $('#main-section #main-form').prepend('<input type="hidden" name="_method" value="put">');

                $('#main-section #main-form [name="id"]').val(project.id);
                $('#main-section #main-form [name="name"]').val(project.name);
                $('#main-section #main-form [name="category"]').val(project.category);
                $('#main-section #main-form [name="description"]').val(project.description);

                $('#main-section [name="projectId"]').val(project.id);

                let html = '';

                sourceArticles.forEach(element => {
                    html += `
                        <button class="list-group-item list-group-item-action">
                            ${ element.title }
                        </button>
                    `;
                });

                $('#sourceArticles').html(html);
                
                html = '';

                resultingArticles.forEach(element => {
                    html += `
                        <button class="list-group-item list-group-item-action">
                            ${ element.title }
                        </button>
                    `;
                });

                $('#resultingArticles').html(html);
            });
        }

        function fillList(data) {
            let html = '';

            data.forEach(element => {
                html += `
                    <button 
                        onClick="showProject(${ element.id })"
                        class="btn-list-item list-group-item list-group-item-action"
                    >
                        <div>${ element.name }</div>
                        <small class="text-primary">${ element.category }</small>
                    </button>
                `;
            });

            $('#sidebar-list').html(html);
        }

        $(document).ready(function() {
            $('#sourceArticleSelect').select2();
            $('#resultingArticleSelect').select2();
        });
    </script>
@endsection