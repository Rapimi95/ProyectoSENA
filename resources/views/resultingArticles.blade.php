@extends('layouts.main')

@section('title')
    Artículos Resultantes
@endsection

@section('list')
    <div id="sidebar-list" class="list-group list-group-flush border-bottom">
        @foreach ($resultingArticles as $resultingArticle)
            <button 
                onClick="showResultingArticle({{ $resultingArticle->id }})"
                class="btn-list-item list-group-item list-group-item-action">
                <div>{{ $resultingArticle->title }}</div>
                <small class="text-primary">{{ $resultingArticle->subject }}</small>
            </button>
        @endforeach
    </div>
@endsection

@section('form')
    <form id="main-form" action="#" method="POST">
        @csrf

        <div class="form-row">
            <div class="col-12">
                <div class="form-group">
                <label for="">Título</label>
                    <input type="text" name="title" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Tema</label>
                    <input type="text" name="subject" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Autor</label>
                    <input type="text" name="author" class="form-control">
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="">url</label>
                    <input type="url" name="url" class="form-control">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">Estado</label>
                    <input type="text" name="state" class="form-control">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">Tipo</label>
                    <input type="text" name="type" class="form-control">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">Año</label>
                    <input type="number" name="year" min="1800" max="3000" class="form-control">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">País</label>
                    <input type="text" name="country" class="form-control">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">Clasificación</label>
                    <input type="text" name="classification" class="form-control">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">Resultado</label>
                    <input type="text" name="result" class="form-control">
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="">Resumen</label>
                    <textarea class="form-control" name="summary" rows="10"></textarea>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="">Contenido</label>
                    <textarea name="content" class="form-control" rows="10"></textarea>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('bottom-section')
    <div class="card mt-4 related-info">
        <div class="card-body">
            <h3 class="mb-4">Proyecto Relacionado</h3>
            <ul id="projectList" class="list-group"></ul>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        module = 'articulos-resultantes';

        function showResultingArticle(id) {
            $.get(`/ajax/find/articulos-resultantes/${id}`, function(data) {
                const project = data.project;
                const resultingArticle = data.resultingArticle;

                $('#main-section').show();

                $('#action-buttons .btn').hide();
                $('#main-section #btn-edit').show();
                $('#main-section #btn-delete').show();

                $('#main-section form .form-control').attr('disabled', true);
                
                $('#main-section form').attr('action', `/articulos/${resultingArticle.id}`);
                $('#main-section form').attr('method', 'post');

                $('#btn-delete').closest('form').attr('action', `/articulos/${resultingArticle.id}`);

                $('#main-section form').prepend('<input type="hidden" name="_method" value="put">');

                $('#main-section form [name="id"]').val(resultingArticle.id);
                $('#main-section form [name="title"]').val(resultingArticle.title);
                $('#main-section form [name="subject"]').val(resultingArticle.subject);
                $('#main-section form [name="url"]').val(resultingArticle.url);
                $('#main-section form [name="author"]').val(resultingArticle.author);
                $('#main-section form [name="state"]').val(resultingArticle.state);
                $('#main-section form [name="type"]').val(resultingArticle.type);
                $('#main-section form [name="content"]').val(resultingArticle.content);
                $('#main-section form [name="year"]').val(resultingArticle.year);
                $('#main-section form [name="country"]').val(resultingArticle.country);
                $('#main-section form [name="result"]').val(resultingArticle.result);
                $('#main-section form [name="summary"]').val(resultingArticle.summary);
                $('#main-section form [name="classification"]').val(resultingArticle.classification);

                let html = '';

                project.forEach(element => {
                    html += `
                        <button class="list-group-item list-group-item-action">
                            ${ element.name }
                        </button>
                    `;
                });

                $('#projectList').html(html);
            });
        }

        function fillList(data) {
            let html = '';

            data.forEach(element => {
                html += `
                    <button 
                        onClick="showResultingArticle(${ element.id })"
                        class="btn-list-item list-group-item list-group-item-action"
                    >
                        <div>${ element.title }</div>
                        <small class="text-primary">${ element.author }</small>
                    </button>
                `;
            });

            $('#sidebar-list').html(html);
        }
    </script>
@endsection