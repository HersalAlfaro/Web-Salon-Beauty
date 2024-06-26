




const limpiarForms = () => {
    // Selecciona el formulario y restablece su estado
    $('#login')[0].reset();
};




$('#login').on('submit', function (event) {
    event.preventDefault();
    $('#btnlogin').prop('disabled', true);
    var formData = new FormData($('#login')[0]);
    $.ajax({
        //url: 'http://localhost/Proyecto_Ambiente_Web/Cliente/Controller/InicioSesionController.php?op=login',
        url: '../../Controller/SessionController.php?op=login',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,

        success: function (datos) {

            switch (datos) {
                case '1':

                    limpiarForms();
                    window.location.href = "../index.php";
                    break;
                case '2':
                    limpiarForms();
                    Swal.fire({
                        icon: 'error',
                        title: 'Credenciales Incorrectas',
                        text: 'Logueado.',
                    });
                    break;

            }
            $('#btnlogin').removeAttr('disabled');
        },
    });
});