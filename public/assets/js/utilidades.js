function eliminar(event, url) {
    event.preventDefault();
    swal({
        title: 'Esta seguro de eliminar?',
        text: "Si elimina este registro no podra recuperarlo! ",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Aceptar'
    }).then(function () {
        window.location = url;
    })
}