@extends('layouts.main')

@section('title')
    Revistas
@endsection

@section('list')
    <div class="list-group list-group-flush border-bottom">
        @foreach ($magazines as $magazine)
            <button 
                onClick="showProject({{ $magazine->id }})"
                class="btn-list-item list-group-item list-group-item-action">
                <div>{{ $magazine->name }}</div>
                <small class="text-primary">{{ $magazine->category }}</small>
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
                    <label for="">Nombre</label>
                    <input type="text" name="name" class="form-control">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="">Código ISSN</label>
                    <input type="text" name="issn_code" class="form-control">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="">Categoría</label>
                    <input type="text" name="category" class="form-control">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="">Clasificación</label>
                    <input type="text" name="classification" class="form-control">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="">Formato</label>
                    <input type="text" name="format" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Temática</label>
                    <input type="text" name="thematic" class="form-control">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="">País</label>
                    <input type="text" name="country" class="form-control">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="">Ciudad</label>
                    <input type="text" name="city" class="form-control">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="">Institución</label>
                    <input type="text" name="institution" class="form-control">
                </div>
            </div>
        </div>
    </form>
@endsection

@section('scripts')
    <script>
        const magazines = @json($magazines);

        function showProject(id) {
            const magazine = magazines.find(item => item.id == id);

            $('#main-section').show();

            $('#action-buttons .btn').hide();
            $('#main-section #btn-edit').show();
            $('#main-section #btn-delete').show();

            $('#main-section form .form-control').attr('disabled', true);
            
            $('#main-section form').attr('action', `/revistas/${magazine.id}`);
            $('#main-section form').attr('method', 'post');

            $('#btn-delete').closest('form').attr('action', `/revistas/${magazine.id}`);

            $('#main-section form').prepend('<input type="hidden" name="_method" value="put">');

            $('#main-section form [name="id"]').val(magazine.id);
            $('#main-section form [name="name"]').val(magazine.name);
            $('#main-section form [name="issn_code"]').val(magazine.issn_code);
            $('#main-section form [name="category"]').val(magazine.category);
            $('#main-section form [name="classification"]').val(magazine.classification);
            $('#main-section form [name="format"]').val(magazine.format);
            $('#main-section form [name="thematic"]').val(magazine.thematic);
            $('#main-section form [name="country"]').val(magazine.country);
            $('#main-section form [name="city"]').val(magazine.city);
            $('#main-section form [name="institution"]').val(magazine.institution);
        }
    </script>
@endsection