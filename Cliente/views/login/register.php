<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">

  <!-- mobile metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="initial-scale=1, maximum-scale=1">
  <!-- site metas -->
  <title>Registro</title>
  <!-- bootstrap css -->
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <!-- style css -->
  <link rel="stylesheet" href="../css/style.css">

  <link rel="stylesheet" href="css/register.css">
  <!-- Responsive-->
  <link rel="stylesheet" href="../css/responsive.css">
  <!-- fevicon -->
  <link rel="icon" href="../images/fevicon.png" type="image/gif" />
  <!-- Scrollbar Custom CSS -->
  <link rel="stylesheet" href="../css/jquery.mCustomScrollbar.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">



</head>

<body>

  <header>
    <!-- header inicio-->
    <?php
    include 'fragments/header.php'
    ?>
  </header>

  <section class="banner_logueo">
    <div>
      <div class="col-md-12">
        <div class="text-bg-logueo">
          <div class="box-log">
            <form name="modulos_add" id="usuario_add" method="POST">
              <h2>Registrarse</h2>
              <div class="row">
              <style>
                  label {
                    display: block;
                    font-weight: bold;
                  }

                  select,
                  input[type="text"] {
                    width: 88%;
                    padding: 8px;
                    border: 1px solid #ccc;
                    border-radius: 4px;
                    font-size: 16px;
                  }
                  input[type="email"] {
                    width: 88%;
                    padding: 8px;
                    border: 1px solid #ccc;
                    border-radius: 4px;
                    font-size: 16px;
                  }
                  input[type="number"] {
                    width: 88%;
                    padding: 8px;
                    border: 1px solid #ccc;
                    border-radius: 4px;
                    font-size: 16px;
                  }
                  input[type="password"] {
                    width: 88%;
                    padding: 8px;
                    border: 1px solid #ccc;
                    border-radius: 4px;
                    font-size: 16px;
                  }

                  select:focus,
                  input[type="text"]:focus {
                    outline: none;
                    border-color: #0056b3;
                    box-shadow: 0 0 5px rgba(0, 86, 179, 0.5);
                  }
                 
                </style>

                <div class="input-box">
                  <h3> <span class="aste">*</span> Campos Requeridos</h3>
                  <input type="text" name="nombre" id="nombre" placeholder="Nombre*" required>
                </div>

                <div class="input-box">
                  <input type="text" name="apellido" id="apellido" placeholder="Apellido*">
                </div>

                <div class="input-box">
                  <input type="email" name="correo" id="correo" required placeholder="Correo Electronico*">
                </div>

                <div class="input-box">
                  <input type="password" name="contrasena" id="contrasena" required placeholder="Contraseña*">
                </div>

                <div class="input-box">
                  <input type="number" name="telefono" id="telefono" required placeholder="Telefono*">
                </div>

              
                <div class="input-box">
                  <select name="pais" id="pais" data-placeholder="Seleccionar Pais"></select>
                </div>

                <div class="input-box">
                  <select name="provincia" id="Provincia" data-placeholder="Seleccionar Provincia"></select>
                </div>

                <div class="input-box">
                  <select name="distrito" id="Distrito" data-placeholder="Seleccionar Distrito"></select>
                </div>

                <div class="input-box">
                  <input type="text" name="canton" id="canton" placeholder="Canton*" required>
                </div>

                <div class="input-box">
                  <input type="text" name="otros" id="otros" placeholder="Otros*">
                </div>

                <div class="input-box" style="display: none;">
                  <input type="checkbox" class="form-check-input" value="false" id="tipoCliente" name="tipoCliente">
                </div>

                <div class="input-box">
                  <button id="btnRegistar" type="submit" class="btn" value="registrar">Registrarse</button>
                </div>


                <p id="parrafo">
                  Al continuar, acepta las Política de privacidad.
                </p>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div>
  </section>

  <footer id="contacto">
    <?php
    include 'fragments/footer.php'
    ?>
  </footer>

  <script src="../js/jquery.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.bundle.min.js"></script>
  <script src="../js/jquery-3.0.0.min.js"></script>

  <script src="../../../Admin/views/plugins/sweetalert2/sweetalert2.all.min.js"></script>

  <script>
    $(document).ready(function() {
      // Agregar placeholders a los selectores usando jQuery
      $('#pais').append('<option value="" disabled selected>Seleccionar País</option>');
      $('#Provincia').append('<option value="" disabled selected>Seleccionar Provincia</option>');
      $('#Distrito').append('<option value="" disabled selected>Seleccionar Distrito</option>');
    });
    $.ajax({
      url: 'https://www.universal-tutorial.com/api/getaccesstoken',
      method: 'GET',
      headers: {
        "Accept": "application/json",
        "api-token": "gKFgtSAtW3sSO4nMw1-ZkSd2iccjdr5QxMfLkqtlrJM3xQZJfhcbPrEPEWZLMKoJNp4",
        "user-email": "hersalalfarocisneros@gmail.com"
      },
      success: function(data) {
        if (data.auth_token) {
          var auth_token = data.auth_token;
          $.ajax({
            url: 'https://www.universal-tutorial.com/api/countries/',
            method: 'GET',
            headers: {
              "Authorization": "Bearer " + auth_token,
              "Accept": "application/json"
            },
            success: function(data) {
              var countries = data;
              var comboCountries = "<option value=''>Seleccionar</option>";
              countries.forEach(element => {
                comboCountries += '<option value="' + element['country_name'] + '">' + element['country_name'] + '</option>';
              });
              $("#pais").html(comboCountries);
              // State list
              $("#pais").on("change", function() {
                var country = this.value;
                $.ajax({
                  url: 'https://www.universal-tutorial.com/api/states/' + country,
                  method: 'GET',
                  headers: {
                    "Authorization": "Bearer " + auth_token,
                    "Accept": "application/json"
                  },
                  success: function(data) {
                    var states = data;
                    var comboStates = "<option value=''>Seleccionar</option>";
                    states.forEach(element => {
                      comboStates += '<option value="' + element['state_name'] + '">' + element['state_name'] + '</option>';
                    });
                    $("#Provincia").html(comboStates);
                    // City list
                    $("#Provincia").on("change", function() {
                      var state = this.value;
                      $.ajax({
                        url: 'https://www.universal-tutorial.com/api/cities/' + state,
                        method: 'GET',
                        headers: {
                          "Authorization": "Bearer " + auth_token,
                          "Accept": "application/json"
                        },
                        success: function(data) {
                          var cities = data;
                          var comboCities = "<option value=''>Seleccionar</option>";
                          cities.forEach(element => {
                            comboCities += '<option value="' + element['city_name'] + '">' + element['city_name'] + '</option>';
                          });
                          $("#Distrito").html(comboCities);
                          if (thisClass.cityValue) {
                            $("#Distrito").val(thisClass.cityValue).trigger("change");
                          }
                        },
                        error: function(e) {
                          console.log("Error al obtener countries: " + e);
                        }
                      });
                    });
                    if (thisClass.stateValue) {
                      $("#Provincia").val(thisClass.stateValue).trigger("change");
                    }
                  },
                  error: function(e) {
                    console.log("Error al obtener countries: " + e);
                  }
                });
              });
              if (thisClass.countryValue) {
                $("#pais").val(thisClass.countryValue).trigger("change");
              }
            },
            error: function(e) {
              console.log("Error al obtener countries: " + e);
            }
          });
        }
      },
      error: function(e) {
        console.log("Error al obtener countries: " + e);
      }
    });
  </script>

  <script src="js/register.js"></script>

</body>

</html>