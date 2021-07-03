<script>
  let module;

  if (location.href.includes('proyectos')) module = 'proyectos';
  if (location.href.includes('articulos')) module = 'articulos';
  if (location.href.includes('revistas')) module = 'revistas';

  $('#main-section').hide();

  $('#btn-store').click(function() {
    Swal.fire({
      title: '¿Estás seguro de guardar este registro?',
      showCancelButton: true,
      confirmButtonText: 'Guardar',
      cancelButtonText: 'Cancelar',
    }).then((result) => {
      if (result.isConfirmed) {
        $('#main-section form').submit();
      }
    });
  });
  
  $('#btn-delete').click(function(event) {
    event.preventDefault();

    Swal.fire({
      title: '¿Estás seguro de eliminar este registro?',
      showCancelButton: true,
      confirmButtonText: 'Eliminar',
      cancelButtonText: 'Cancelar',
    }).then((result) => {
      if (result.isConfirmed) {
        $('#btn-delete').closest('form').submit();
      }
    });  
  });

  $('#btn-create').click(function() {
    $('#main-section').show();

    $('#action-buttons .btn').hide();
    $('#main-section #btn-store').show();
    $('#main-section #btn-cancel-create').show();

    $('#main-section form .form-control').attr('disabled', false);
    $('#main-section form .form-control').val('');

    $('#main-section form [name="_method"]').remove();

    $('#main-section form').attr('action', `/${module}`);
    $('#main-section form').attr('method', 'post');
  });

  $('#btn-edit').click(function() {
    $('#action-buttons .btn').hide();
    $('#main-section #btn-store').show();
    $('#main-section #btn-cancel-edit').show();

    $('#main-section form .form-control').attr('disabled', false);
  });

  $('#btn-cancel-edit').click(function() {
    $('#action-buttons .btn').hide();
    $('#main-section #btn-delete').show();
    $('#main-section #btn-edit').show();

    $('#main-section form .form-control').attr('disabled', true);
  });
  
  $('#btn-cancel-create').click(function() {
    $('#main-section').hide();
  });

  $('#btn-search').click(function(event) {
    event.preventDefault();

    const query = $('#input-search').val().trim();
    
    $.get(`/ajax/${module}/${query}`, function(data) {
      fillList(data);
    });
  });
</script>