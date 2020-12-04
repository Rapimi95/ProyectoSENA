@extends('layouts.main')

@section('title')
    Artículos
@endsection

@section('list')
    <div class="list-group list-group-flush border-bottom">
        @foreach ($articles as $article)
            <button 
                onClick="showProject({{ $article->id }})"
                class="btn-list-item list-group-item list-group-item-action">
                <div>{{ $article->title }}</div>
                <small class="text-primary">{{ $article->subject }}</small>
            </button>
        @endforeach
    </div>
@endsection

@section('form')
    <form action="#">
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

@section('scripts')
    <script>
        const articles = @json($articles);

        function showProject(id) {
            const article = articles.find(item => item.id == id);

            $('#main-section').show();

            $('#action-buttons .btn').hide();
            $('#main-section #btn-edit').show();
            $('#main-section #btn-delete').show();

            $('#main-section form .form-control').attr('disabled', true);
            
            $('#main-section form').attr('action', `/articulos/${article.id}`);
            $('#main-section form').attr('method', 'post');

            $('#btn-delete').closest('form').attr('action', `/articulos/${article.id}`);

            $('#main-section form').prepend('<input type="hidden" name="_method" value="put">');

            $('#main-section form [name="id"]').val(article.id);
            $('#main-section form [name="title"]').val(article.title);
            $('#main-section form [name="subject"]').val(article.subject);
            $('#main-section form [name="url"]').val(article.url);
            $('#main-section form [name="author"]').val(article.author);
            $('#main-section form [name="state"]').val(article.state);
            $('#main-section form [name="type"]').val(article.type);
            $('#main-section form [name="content"]').val(article.content);
            $('#main-section form [name="year"]').val(article.year);
            $('#main-section form [name="country"]').val(article.country);
            $('#main-section form [name="result"]').val(article.result);
            $('#main-section form [name="summary"]').val(article.summary);
            $('#main-section form [name="classification"]').val(article.classification);
        }
    </script>
@endsection