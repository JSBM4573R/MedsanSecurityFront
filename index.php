<?php
    include_once 'database1.php';
    
    session_start();

    require 'database1.php';
  
    if (!empty($_POST['email']) && !empty($_POST['password'])) {
      $records = $conn->prepare('SELECT *FROM usuarios WHERE email = :email1');
      $records->bindParam(':email1', $_POST['email']);
      $records->execute();

      $row = $records->fetch(PDO::FETCH_NUM);
        
      if($row == true){
          $rol = $row[7];
          
          $_SESSION['rol'] = $rol;
          switch($rol){
              case 1:
                "
                    <script>
                    alert('Ingreso exitoso');
                    </script>";

                header('location: index.html');
              break;

              case 2:
                "
                    <script>
                    alert('Ingreso exitoso');
                    </script>";

                header('location: index.html');
              break;

              default:
          }
      }else{
                             

      }

    }



    $message = '';

    if (!empty($_POST['email']) && !empty($_POST['password'])) {
      $sql = "INSERT INTO usuarios (nombres,apellidos,telefono,email,password,confirm_password,rol_id) VALUES (:nombres, :apellidos, :telefono, :email, :password, :confirm_password, :rol_id)";
      $stmt = $conn->prepare($sql);
      $stmt->bindParam(':nombres', $_POST['nombres']);
      $stmt->bindParam(':apellidos', $_POST['apellidos']);
      $stmt->bindParam(':telefono', $_POST['telefono']);
      $stmt->bindParam(':email', $_POST['email']);
      //$password = password_hash($_POST['password'], PASSWORD_BCRYPT); //encriptar password
      //$stmt->bindParam(':password', $password); //encriptar password
      $stmt->bindParam(':password', $_POST['password']);
      $stmt->bindParam(':confirm_password', $_POST['confirm_password']);
      $stmt->bindParam(':rol_id', $_POST['rol_id']);
      if ($stmt->execute()) {
        //$message = 'Cuenta Creada correctamente';
        "
                    <script>
                    alert('Registro exitoso');
                    </script>";

      } else {
        //$message = 'Lo sentimos, verifica el registro e ingresalos nuevamente';
        echo "<script> Swal.fire({
            icon: 'error',
            title: 'Error',
        });
        </script>";
      }
    }

?>



<!DOCTYPE html>
<html lang="es">

<head>
    <title>Medsan Security</title>

    <!-- meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <script src="https://kit.fontawesome.com/2cb25f2c39.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Estilos -->
    <link rel="stylesheet" href="css/styleWsp.css">
    <link rel="stylesheet" href="css/styleHome.css">
    <link rel="stylesheet" href="css/styleModal.css">

    <!--Import AJAX-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!--footer-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- sweet alert 2 -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- AOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;700&display=swap" rel="stylesheet">
</head>

<body>
    <!-- Barra de navegacion -->
    <header>
        <div class="header-brackgorund">
            <div id="nav" class="sticky-nav">
                <nav class="navbar navbar-expand-lg">
                    <div class="container">
                        <a href="#section-inicio"><img src="medios/logo-medsan-light.png" alt=""></a>    
                        <h1 class="navbar-brand">Medsan Security</h1>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                            <span></span>
                            <span></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-auto">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="#section-nosotros">Nosotros</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#section-productos">Productos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#section-servicios">Servicios</a>
                                </li>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#section-contactanos">Contactanos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="" data-bs-toggle="modal" data-bs-target="#login">
                                        Ingresar
                                    </a>
                                </li>
                                <!-- <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        Ingresar
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <li>
                                            <a class="dropdown-item" href="../Login/formulario.php" data-bs-toggle="modal"
                                            data-bs-target="#loginCliente">
                                            Cliente
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="../Login/formulario.php" data-bs-toggle="modal"
                                            data-bs-target="#loginAdministrador">
                                            Administrador
                                            </a>
                                        </li>
                                        </ul> -->
                            </ul>
                            <!-- <form class="d-flex">
                                <button class="btn" type="submit">Cotiza ahora!</button>
                                </form> -->
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </header>


    <!-- Modal Cliente -->
    <div class="modal" id="login" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Inicio de Sesion
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="index.php" method="POST" class="needs-validation" novalidate>
                    <div class="modal-body">
                        <div class="modal-form">
                            <div>
                                <label for="correo" class="form-label" style="color: black; padding-top: 15px;">Corre Electronico</label>
                                <input type="email" id="correo" name="correo" placeholder="Tu contraseña" class="form-control" required>
                                <div class="invalid-feedback">Porfavor ingrese su correo</div>
                            </div>
                            <div>
                                <label for="contraseña" class="form-label" style="color: black; padding-top: 15px;">Contraseña</label>
                                <input type="password" id="contraseña" name="contraseña" placeholder="Tu contraseña" class="form-control" required>
                                <div class="invalid-feedback">Porfavor ingrese su contraseña</div>
                            </div>
                            <div class="form-check-login" style="margin-top: 10px;">
                                <label for="recordarme-check" class="recordarme-check"><input class="check"  type="checkbox" value="" id="recordarme-check">Recordarme</label>
                                <label><a class="nav-link" href="" data-bs-toggle="modal" data-bs-target="#registro" style="font-size: .98rem;">¿No tienes una cuenta?</a></label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Ingresar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>




    <!-- Modal Cotizacion -->
    <div class="modal" id="fCotizacion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Formulario de Cotizacion
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="https://formsubmit.co/jsbustos43@misena.edu.co" method="POST" class="needs-validation" novalidate>
                    <div class="modal-body">
                        <div class="modal-form">
                            <div>
                                <label for="tipoServicio" class="form-label" style="color: black; padding-top: 15px;">Tipo de servicio</label>
                                <select name="TipoServicios" id="servicios" class="form-select" required>
                                    <option selected disabled value="">Seleccione...</option>
                                    <option name="sInstalacion" id="sInstalacion">Instalacion</option>
                                    <option name="sMantenimiento" id="sMantenimiento">Mantenimiento</option>
                                    <option name="sReparacion" id="Reparacionto">Reparacion</option>
                                </select>
                                <div class="invalid-feedback">Porfavor selecciona un servicio</div>
                            </div>
                            <div>
                                <label for="nombreServicio" class="form-label" style="color: black; padding-top: 15px;">Nombres</label>
                                <input type="text" id="nombreServicio" name="nombreServicio" placeholder="Tu nombre" class="form-control" required>
                                <div class="invalid-feedback">Porfavor digite su nombre</div>
                            </div>
                            <div>
                                <label for="correoServicio" class="form-label" style="color: black; padding-top: 15px;">Correo Electronico</label>
                                <input type="text" id="correoServicio" name="correoServicio" placeholder="Tu Correo" class="form-control" required>
                                <div class="invalid-feedback">Porfavor digite su correo</div>
                            </div>
                            <div>
                                <label for="telefonoServicio" class="form-label" style="color: black; padding-top: 15px;">Telefono</label>
                                <input type="text" id="telefonoServicio" name="telefonoServicio" placeholder="Tu telefono" class="form-control" required>
                                <div class="invalid-feedback">Porfavor digite su telefono</div>
                            </div>
                            <div>
                                <label for="direccionServicio" class="form-label" style="color: black; padding-top: 15px;">Direccion</label>
                                <input type="text" id="direccionServicio" name="direccionServicio" placeholder="Tu direccion de servicio" class="form-control" required>
                                <div class="invalid-feedback">Porfavor digite la direccion</div>
                            </div>
                            <div>
                                <label for="descripcionServicio" class="form-label" style="color: black; padding-top: 15px;">Descripcion</label>
                                <textarea name="descripcionServicio" id="descripcionServicio" cols="30" rows="8" placeholder="Breve descripcion de tu solicitud..." class="form-control" required></textarea>
                                <div class="invalid-feedback">Porfavor realice una descripcion</div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit"  class="btn btn-primary">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Modal Registro -->
    <div class="modal" id="registro" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Registro
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                
                <form action = "index.php" method = "POST" class="needs-validation" novalidate>
                    <div class="modal-body">
                        <div class="modal-form">
                            <div>
                                <label for="nombre" class="form-label" style="color: black; padding-top: 15px;">Nombres</label>
                                <input type="text" id="nombreRegistro" name="nombres" placeholder="Tu nombre(s)" class="form-control" required>
                                <div class="invalid-feedback">Porfavor digite su nombre</div>
                            </div>
                            <div>
                                <label for="apellido" class="form-label" style="color: black; padding-top: 15px;">Apellidos</label>
                                <input type="text" id="nombreRegistro" name="apellidos" placeholder="Tu apellido(s)" class="form-control" required>
                                <div class="invalid-feedback">Porfavor digite su apellido</div>
                            </div>
                            <div>
                                <label for="telefono" class="form-label" style="color: black; padding-top: 15px;">Telefono</label>
                                <input type="number" id="nombreRegistro" name="telefono" placeholder="Tu telefono" class="form-control" required>
                                <div class="invalid-feedback">Porfavor digite su numero contacto</div>
                            </div>
                            <div>
                                <label for="email" class="form-label" style="color: black; padding-top: 15px;">Correo Electronico</label>
                                <input type="email" id="nombreRegistro" name="email" placeholder="Tu correo" class="form-control" required>
                                <div class="invalid-feedback">Porfavor digite su Correo Electronico</div>
                            </div>
                            <div>
                                <label for="password" class="form-label" style="color: black; padding-top: 15px;">Contraseña</label>
                                <input type="password" id="nombreRegistro" name="password" placeholder="Tu contraseña" class="form-control" required>
                                <div class="invalid-feedback">Porfavor digite su contraseña</div>
                            </div>
                            <div>
                                <label for="password" class="form-label" style="color: black; padding-top: 15px;">Confirmar contraseña</label>
                                <input type="password" id="nombreRegistro" name="confirm_password" placeholder="Tu contraseña" class="form-control" required>
                                <div class="invalid-feedback">Porfavor vuelva a digitar su contraseña</div>
                            </div>
                            <div class="form-check">
                                <input class="form-check" type="checkbox" value="" id="invalidCheck" required>
                                <label class="form-check-label" for="invalidCheck">
                                    <a href="" data-bs-toggle="modal" data-bs-target="#politica-privacidad">Acepta la
                                        politica de tratamiento de datos personales?</a>
                                </label>
                                <div class="invalid-feedback">
                                  Acepta la politica de privacidad.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" name="guardar" class="btn btn-primary">Registrarme</button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>


    <!-- Modal privacidad -->
    <div class="modal fade" id="politica-privacidad" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="staticBackdropLabel">Política de privacidad y tratamiento de datos personales</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="privacidad-description" style="text-align: justify;">
                        <p>Política de privacidad de Medsan Security
                            Esta Política de privacidad describe cómo se recopila, utiliza y comparte su información personal cuando visita o hace una compra en www.medsansecurity.com (denominado en lo sucesivo el “Sitio”).
                            INFORMACIÓN PERSONAL QUE RECOPILAMOS
                            Cuando visita el Sitio, recopilamos automáticamente cierta información sobre su dispositivo, incluida información sobre su navegador web, dirección IP, zona horaria y algunas de las cookies que están instaladas en su dispositivo. Además, a medida que navega por el Sitio, recopilamos información sobre las páginas web individuales o los productos que ve, las páginas web o los términos de búsqueda que lo remitieron al Sitio e información sobre cómo interactúa usted con el Sitio. Nos referimos a esta información recopilada automáticamente como “Información del dispositivo”.
                            Recopilamos Información del dispositivo mediante el uso de las siguientes tecnologías:
                            - Los “Archivos de registro” rastrean las acciones que ocurren en el Sitio y recopilan datos, incluyendo su dirección IP, tipo de navegador, proveedor de servicio de Internet, páginas de referencia/salida y marcas de fecha/horario.
                                - Las “balizas web”, las “etiquetas” y los “píxeles” son archivos electrónicos utilizados para registrar información sobre cómo navega usted por el Sitio.
                                [[INSERTAR DESCRIPCIONES DE OTROS TIPOS DE TECNOLOGÍAS DE SEGUIMIENTO QUE SE UTILICEN]]
                            Además, cuando hace una compra o intenta hacer una compra a través del Sitio, recopilamos cierta información de usted, entre la que se incluye su nombre, dirección de facturación, dirección de envío, información de pago (incluidos los números de la tarjeta de crédito [[INSERTAR CUALQUIER OTRO TIPO DE PAGO ACEPTADO]]), dirección de correo electrónico y número de teléfono.  Nos referimos a esta información como “Información del pedido”.
                            [[INSERTAR CUALQUIER OTRA INFORMACIÓN QUE USTED RECOPILA: DATOS SIN CONEXIÓN, LISTAS/DATOS DE MARKETING ADQUIRIDOS]]
                            Cuando hablamos de “Información personal” en la presente Política de privacidad, nos referimos tanto a la Información del dispositivo como a la Información del pedido.
                            ¿CÓMO UTILIZAMOS SU INFORMACIÓN PERSONAL?
                            Usamos la Información del pedido que recopilamos en general para preparar los pedidos realizados a través del Sitio (incluido el procesamiento de su información de pago, la organización de los envíos y la entrega de facturas y/o confirmaciones de pedido).  Además, utilizamos esta Información del pedido para: comunicarnos con usted;
                            examinar nuestros pedidos en busca de fraudes o riesgos potenciales; y cuando de acuerdo con las preferencias que usted compartió con nosotros, le proporcionamos información o publicidad relacionada con nuestros productos o servicios.
                            [[INSERTAR OTROS USOS DE INFORMACIÓN DEL PEDIDO]]
                            Utilizamos la Información del dispositivo que recopilamos para ayudarnos a detectar posibles riesgos y fraudes (en particular, su dirección IP) y, en general, para mejorar y optimizar nuestro Sitio (por ejemplo, al generar informes y estadísticas sobre cómo nuestros clientes navegan e interactúan con el Sitio y para evaluar el éxito de nuestras campañas publicitarias y de marketing).
                            [[INSERTAR OTROS USOS DE INFORMACIÓN DEL DISPOSITIVO, INCLUIDOS PUBLICIDAD/RETARGETING]]
                            COMPARTIR SU INFORMACIÓN PERSONAL
                            Compartimos su Información personal con terceros para que nos ayuden a utilizar su Información personal, tal como se describió anteriormente.  Por ejemplo, utilizamos la tecnología de Shopify en nuestra tienda online. Puede obtener más información sobre cómo Shopify utiliza su Información personal aquí: https://www.shopify.com/legal/privacy.  También utilizamos Google Analytics para ayudarnos a comprender cómo usan nuestros clientes el Sitio. Puede obtener más información sobre cómo Google utiliza su Información personal aquí: https://www.google.com/intl/es/policies/privacy/.  Puede darse de baja de Google Analytics aquí: https://tools.google.com/dlpage/gaoptout.
                            Finalmente, también podemos compartir su Información personal para cumplir con las leyes y regulaciones aplicables, para responder a una citación, orden de registro u otra solicitud legal de información que recibamos, o para proteger nuestros derechos.
                            [[INCLUIR SI SE USA REMARKETING O PUBLICIDAD DIRIGIDA]]
                            PUBLICIDAD ORIENTADA POR EL COMPORTAMIENTO
                            Como se describió anteriormente, utilizamos su Información personal para proporcionarle anuncios publicitarios dirigidos o comunicaciones de marketing que creemos que pueden ser de su interés.  Para más información sobre cómo funciona la publicidad dirigida, puede visitar la página educativa de la Iniciativa Publicitaria en la Red ("NAI" por sus siglas en inglés) en http://www.networkadvertising.org/understanding-online-advertising/how-does-it-work.
                            Puede darse de baja de la publicidad dirigida mediante los siguientes enlaces:
                            [[
                            INCLUIR ENLACES PARA DARSE DE BAJA DE CUALQUIER SERVICIO QUE SE UTILICE.
                            ALGUNOS ENLACES FRECUENTES INCLUYEN:
                            FACEBOOK: https://www.facebook.com/settings/?tab=ads
                                GOOGLE: https://adssettings.google.com/authenticated?hl=es
                                BING: https://about.ads.microsoft.com/es-es/recursos/directivas/anuncios-personalizados
                            ]]
                            Además, puede darse de baja de algunos de estos servicios visitando el portal de exclusión voluntaria de Digital Advertising Alliance en: ttp://optout.aboutads.info/.
                            NO RASTREAR
                            Tenga en cuenta que no alteramos las prácticas de recopilación y uso de datos de nuestro Sitio cuando vemos una señal de No rastrear desde su navegador.
                            [[INCLUIR SI LA TIENDA ESTÁ UBICADA EN EUROPA O SI TIENE CLIENTES EN EUROPA]]
                            SUS DERECHOS
                            Si usted es un residente europeo, tiene derecho a acceder a la información personal que tenemos sobre usted y a solicitar que su información personal sea corregida, actualizada o eliminada. Si desea ejercer este derecho, comuníquese con nosotros a través de la información de contacto que se encuentra a continuación.
                            Además, si usted es un residente europeo, tenemos en cuenta que estamos procesando su información para cumplir con los contratos que podamos tener con usted (por ejemplo, si realiza un pedido a través del Sitio) o para perseguir nuestros intereses comerciales legítimos enumerados anteriormente.  Además, tenga en cuenta que su información se transferirá fuera de Europa, incluidos Canadá y los Estados Unidos.
                            RETENCIÓN DE DATOS
                            Cuando realiza un pedido a través del Sitio, mantendremos su Información del pedido para nuestros registros a menos que y hasta que nos pida que eliminemos esta información.
                            [[INSERTAR SI SE REQUIERE RESTRICCIÓN DE EDAD]]
                            MENORES
                            El sitio no está destinado a personas menores de [[INSERTAR EDAD]].
                            CAMBIOS
                            Podemos actualizar esta política de privacidad periódicamente para reflejar, por ejemplo, cambios en nuestras prácticas o por otros motivos operativos, legales o reglamentarios.
                            CONTÁCTENOS
                            Para obtener más información sobre nuestras prácticas de privacidad, si tiene alguna pregunta o si desea presentar una queja, contáctenos por correo electrónico a jsbustos43@misena.edu.co o por correo mediante el uso de la información que se proporciona a continuación:
                            Kra 92 #8c-36, Castilla, Kennedy, Bogotá D.C., Bogota, DC, 11166, Colombia</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No Acepto</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Acepto</button>
                </div>
            </div>
        </div>
    </div>


        <!-- Modal cookies -->
        <div class="modal fade" id="politica-cookies" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-center" id="staticBackdropLabel">Política de cookies</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="privacidad-description" style="text-align: justify;">
                            <p> El acceso a este Sitio Web puede implicar la utilización de cookies. Las cookies son pequeñas cantidades de información que se almacenan en el navegador utilizado por cada Usuario —en los distintos dispositivos que pueda utilizar para navegar— para que el servidor recuerde cierta información que posteriormente y únicamente el servidor que la implementó leerá. Las cookies facilitan la navegación, la hacen más amigable, y no dañan el dispositivo de navegación.
                                Las cookies son procedimientos automáticos de recogida de información relativa a las preferencias determinadas por el Usuario durante su visita al Sitio Web con el fin de reconocerlo como Usuario, y personalizar su experiencia y el uso del Sitio Web, y pueden también, por ejemplo, ayudar a identificar y resolver errores.
                                La información recabada a través de las cookies puede incluir la fecha y hora de visitas al Sitio Web, las páginas visionadas, el tiempo que ha estado en el Sitio Web y los sitios visitados justo antes y después del mismo. Sin embargo, ninguna cookie permite que esta misma pueda contactarse con el número de teléfono del Usuario o con cualquier otro medio de contacto personal. Ninguna cookie puede extraer información del disco duro del Usuario o robar información personal. La única manera de que la información privada del Usuario forme parte del archivo Cookie es que el usuario dé personalmente esa información al servidor.
                                Las cookies que permiten identificar a una persona se consideran datos personales. Por tanto, a las mismas les será de aplicación la Política de Privacidad anteriormente descrita. En este sentido, para la utilización de las mismas será necesario el consentimiento del Usuario. Este consentimiento será comunicado, en base a una elección auténtica, ofrecido mediante una decisión afirmativa y positiva, antes del tratamiento inicial, removible y documentado.
                                Deshabilitar, rechazar y eliminar cookies
                                El Usuario puede deshabilitar, rechazar y eliminar las cookies —total o parcialmente— instaladas en su dispositivo mediante la configuración de su navegador (entre los que se encuentran, por ejemplo, Chrome, Firefox, Safari, Explorer). En este sentido, los procedimientos para rechazar y eliminar las cookies pueden diferir de un navegador de Internet a otro. En consecuencia, el Usuario debe acudir a las instrucciones facilitadas por el propio navegador de Internet que esté utilizando. En el supuesto de que rechace el uso de cookies —total o parcialmente— podrá seguir usando el Sitio Web, si bien podrá tener limitada la utilización de algunas de las prestaciones del mismo.</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No Acepto</button>
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Acepto</button>
                    </div>
                </div>
            </div>
        </div>



    <section id="section-inicio">
        <!-- <div class="inicio pre" id="section-inicio">
            <main>
                <div class="peliculas-recomendadas contenedor">
                    <div class="contenedor-titulo-controles">
                        <h3>Medsan security</h3>
                        <div class="indicadores"></div>
                    </div>

                    <div class="contenedor-principal">
                        <button role="button" id="flecha-izquierda" class="flecha-izquierda"><i
                                class="fas fa-angle-left"></i></button>

                        <div class="contenedor-carousel">
                            <div class="carousel">
                                <div class="pelicula">
                                    <a href="#"><img src="img/1.jpeg" alt=""></a>
                                </div>
                                <div class="pelicula">
                                    <a href="#"><img src="img/2.jpg" alt="1"></a>
                                </div>
                                <div class="pelicula">
                                    <a href="#"><img src="img/3.jpg" alt="2"></a>
                                </div>
                                <div class="pelicula">
                                    <a href="#"><img src="img/4.jpg" alt="3"></a>
                                </div>
                                <div class="pelicula">
                                    <a href="#"><img src="img/5.jpg" alt="4"></a>
                                </div>
                                <div class="pelicula">
                                    <a href="#"><img src="img/6.jpg" alt="5"></a>
                                </div>
                                <div class="pelicula">
                                    <a href="#"><img src="img/5.jpg" alt="6"></a>
                                </div>
                                <div class="pelicula">
                                    <a href="#"><img src="img/4.jpg" alt="7"></a>
                                </div>
                            </div>
                        </div>
                        <button role="button" id="flecha-derecha" class="flecha-derecha"><i
                                class="fas fa-angle-right"></i></button>
                    </div>
                </div>

            </main>

        </div> -->

        <div class="contenedor-inicio">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="contenedor-descripcion align-self-center px-5">
                            <div class="titulo">
                                <h1 class="text-uppercase font-weight-bold mb-4">EXPERTOS EN SEGURIDAD ELECTRONICA</h1>
                            </div>
                            <div class="descripcion lead-xl mb-4 text-center">
                                <p>Sistemas y servicios de seguridad electrónica para gestionar los riesgos que puede enfrentar su organización con soluciones tecnológicas integradas y personalizadas.</p>
                            </div>
                            <a class="btn btn-primary button-inicio font-weight-bold" href="#section-productos">Comprar</a>
                        </div>
                        
                    </div>
                    
                </div>
            </div>
            
        </div>
        



    </section>



    <section id="section-nosotros"> 
        <div class="contenido-nosotros">
            <div class="col-lg-12">
                <div class="row">
                    <div class="contenido-nosotros-mision"></div>
                        <div class="mision col-lg-6">
                                <div class="titulo-mision" data-aos="fade-right">
                                    <h1>MISION</h1>
                                </div>
                                <div class="contenido-mision" data-aos="fade-up-right">
                                    <p>Establecernos a nivel nacional en la distribución e integración de sistemas de seguridad inteligente para los hogares y empresas, que cubran las necesidades de nuestros clientes, optimizando sus costos y creciendo de forma sostenible.</p>
                                </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="imagen-mision" data-aos="zoom-in-left">
                                <img src="img/mision.jpg" alt="">
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="contenido-nosotros-vision"></div>
                        
                        <div class="vision col-lg-6 ">
                                <div class="titulo-vision" data-aos="fade-right">
                                    <h1>VISION</h1>
                                </div>
                                <div class="contenido-vision" data-aos="fade-up-right">
                                    <p>Ser una empresa exitosa, reconocida y respetada por entregar un servicio de excelencia en la comercialización, integración, instalación y mantenimiento de Sistemas Electrónicos de Seguridad</p>
                                </div>
                        </div>
                        <div class="col-lg-6 ">
                            <div class="imagen-vision" data-aos="zoom-in-left">
                                <img src="img/vision.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <section>
        <div class="medio anuncio1">
            <h1>Los mejores productos de seguridad electronica</h1>
        </div>
    </section>




    <section id="section-productos">
        <div class="section-productos">
            <main>
                <div class="container__card">
                    <!-- producto1 -->
                    <div class="card__father" data-aos="zoom-in">
                        <div class="card">
                            <div class="card__front" style="background-image: url(camaras/AlrmasParadox/ALARMAS_PERU_PARADOX_SP4000-.jpg);">
                                <div class="bg"></div>
                                <div class="body__card_front">
                                    <h1>Alarmas paradox</h1>
                                </div>
                            </div>
                            <div class="card__back">
                                <div class="body__card_back">
                                    <h1>Alarmas paradox</h1>
                                    <a href="http://servicio.mercadolibre.com.co/MCO-839265355-venta-instalacion-y-mantenimiento-de-camaras-de-seguridad-_JM"
                                        type="button" class="btn btn-primary">Comprar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- producto2 -->
                    <div class="card__father" data-aos="zoom-in">
                        <div class="card">
                            <div class="card__front" style="background-image: url(camaras/CamarasDeportivas/CSSP208A0212WFBS\ DEPORTIVA.png);">
                                <div class="bg"></div>
                                <div class="body__card_front">
                                    <h1>Camara deportiva</h1>
                                </div>
                            </div>
                            <div class="card__back">
                                <div class="body__card_back">
                                    <h1>Camara deportiva</h1>
                                    <a href="http://servicio.mercadolibre.com.co/MCO-839265355-venta-instalacion-y-mantenimiento-de-camaras-de-seguridad-_JM"
                                        type="button" class="btn btn-primary">Comprar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- producto3 -->
                    <div class="card__father" data-aos="zoom-in">
                        <div class="card">
                            <div class="card__front" style="background-image: url(camaras/CamarasDomo/51fCHr77cUL._AC_SY355_.jpg);">
                                <div class="bg"></div>
                                <div class="body__card_front">
                                    <h1>Camaras Domo</h1>
                                </div>
                            </div>
                            <div class="card__back">
                                <div class="body__card_back">
                                    <h1>Camaras Domo</h1>
                                    <a href="http://servicio.mercadolibre.com.co/MCO-839265355-venta-instalacion-y-mantenimiento-de-camaras-de-seguridad-_JM"
                                        type="button" class="btn btn-primary">Comprar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- producto4 -->
                    <div class="card__father" data-aos="zoom-in">
                        <div class="card">
                            <div class="card__front" style="background-image: url(camaras/CamarasPTZ/Dahua_SD50225UN-HNI.jpg);">
                                <div class="bg"></div>
                                <div class="body__card_front">
                                    <h1>Camara PTZ</h1>
                                </div>
                            </div>
                            <div class="card__back">
                                <div class="body__card_back">
                                    <h1>Camara PTZ</h1>
                                    <a href="http://servicio.mercadolibre.com.co/MCO-839265355-venta-instalacion-y-mantenimiento-de-camaras-de-seguridad-_JM"
                                        type="button" class="btn btn-primary">Comprar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- producto5 -->
                    <div class="card__father" data-aos="zoom-in">
                        <div class="card">
                            <div class="card__front" style="background-image: url(camaras/CamarasTipoBala/004827_29012021154632.jpg);">
                                <div class="bg"></div>
                                <div class="body__card_front">
                                    <h1>Camara tipo bala</h1>
                                </div>
                            </div>
                            <div class="card__back">
                                <div class="body__card_back">
                                    <h1>Camara tipo bala</h1>
                                    <a href="http://servicio.mercadolibre.com.co/MCO-839265355-venta-instalacion-y-mantenimiento-de-camaras-de-seguridad-_JM"
                                        type="button" class="btn btn-primary">Comprar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- producto6 -->
                    <div class="card__father" data-aos="zoom-in">
                        <div class="card">
                            <div class="card__front" style="background-image: url(camaras/CamarasTipoWifi/a110b2.jpg);">
                                <div class="bg"></div>
                                <div class="body__card_front">
                                    <h1>Camara wifi</h1>
                                </div>
                            </div>
                            <div class="card__back">
                                <div class="body__card_back">
                                    <h1>Camara wifi</h1>
                                    <a href="http://servicio.mercadolibre.com.co/MCO-839265355-venta-instalacion-y-mantenimiento-de-camaras-de-seguridad-_JM"
                                        type="button" class="btn btn-primary">Comprar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- producto7 -->
                    <div class="card__father" data-aos="zoom-in">
                        <div class="card">
                            <div class="card__front" style="background-image: url(camaras/ControlDeAccesoPersonal/control-de-acceso-3000-huella-30000-registros-tcp-ip-usb-ent-sal-wiegand-anti-passback-comp-fr1200.jpg);">
                                <div class="bg"></div>
                                <div class="body__card_front">
                                    <h1>Camara de control de acceso</h1>
                                </div>
                            </div>
                            <div class="card__back">
                                <div class="body__card_back">
                                    <h1>Camara de control de acceso</h1>
                                    <a href="http://servicio.mercadolibre.com.co/MCO-839265355-venta-instalacion-y-mantenimiento-de-camaras-de-seguridad-_JM"
                                        type="button" class="btn btn-primary">Comprar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- producto8 -->
                    <div class="card__father" data-aos="zoom-in">
                        <div class="card">
                            <div class="card__front" style="background-image: url(camaras/KitDeCamaras/704902-mla41008853824_032020-o-2b131fb93f6dad029315836039360898-640-0.jpg);">
                                <div class="bg"></div>
                                <div class="body__card_front">
                                    <h1>Kit de camaras</h1>
                                </div>
                            </div>
                            <div class="card__back">
                                <div class="body__card_back">
                                    <h1>Kit de camaras</h1>
                                    <a href="http://servicio.mercadolibre.com.co/MCO-839265355-venta-instalacion-y-mantenimiento-de-camaras-de-seguridad-_JM"
                                        type="button" class="btn btn-primary">Comprar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </section>



    <section>
        <div class="medio anuncio1">
                <h1>El mejor servicio a su disposicion.</h1>
        </div>
    </section>



    <section id="section-servicios">
        <div class="container-servicios">
            <div class="row">
                <div class="card-servicios col-lg-12 text-center">
                    <div class="row">
                        <!-- tarjeta -->
                        <div class="tarjeta col-lg-4" data-aos="fade-down">
                            <div class="card-section border rounded p-3">
                                <div class="card-header-first rounded pb-5">
                                    <h2 class="card-header-title text-white pt-3">Mantenimiento</h2>
                                </div>
                                <div class="card-body text-center">
                                    <h5 class="card-title">Servicio Mantenimiento</h5>
                                    <p class="card-text">Con este servicios tu podras acceder a un mantenimiento
                                        gratuito despues de adquirir nuestros productos</p>

                                </div>
                                <div class="card-footer"><a class="nav-link btn btn-primary" href=""
                                        data-bs-toggle="modal" data-bs-target="#fCotizacion">
                                        Cotiza Ahora!
                                    </a></div>
                            </div>
                        </div>
                        <!-- tarjeta -->
                        <div class="tarjeta col-lg-4" data-aos="fade-down">
                            <div class="card-section border rounded p-3">
                                <div class="card-header-first rounded pb-5">
                                    <h2 class="card-header-title text-white pt-3">Instalacion</h2>
                                </div>
                                <div class="card-body text-center">
                                    <h5 class="card-title">Servicio Instalacion</h5>
                                    <p class="card-text">Con este servicios tu podras acceder a una instalacion
                                        personalizada de nuestros productos deacuerdo a tus necesidades.</p>

                                </div>
                                <div class="card-footer"><a class="nav-link btn btn-primary" href=""
                                        data-bs-toggle="modal" data-bs-target="#fCotizacion">
                                        Cotiza Ahora!
                                    </a></div>
                            </div>
                        </div>
                        <!-- tarjeta -->
                        <div class="tarjeta col-lg-4" data-aos="fade-down">
                            <div class="card-section border rounded p-3">
                                <div class="card-header-first rounded pb-5">
                                    <h2 class="card-header-title text-white pt-3">Reparacion</h2>
                                </div>
                                <div class="card-body text-center">
                                    <h5 class="card-title">Servicio Reparacion</h5>
                                    <p class="card-text">Con este servicios tu puedes acceder a la reparacion de
                                        nuestros productos adquiridos o reclamar garantia en caso de ser necesario.</p>

                                </div>
                                <div class="card-footer"><a class="nav-link btn btn-primary" href=""
                                        data-bs-toggle="modal" data-bs-target="#fCotizacion">
                                        Cotiza Ahora!
                                    </a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section>
        <div class="medio anuncio2">
            <div class="contenido-anuncio2 col-lg-12">
                <div class="row">
                    <div class="col-lg-6" data-aos="zoom-out-right">
                        <img class="imagen-comentario" src="img/Feedback-coments.svg" alt="">
                    </div>
                    <div class="texto-anuncio2 col-lg-6" data-aos="fade-right">
                        <h1>Valoramos sus comentarios y sugerencias para mejorar nuestra pagina WEB.</h1>
                        <h2>Cada comentario que introduce es revisado por una persona y, si se incluye una dirección de
                            correo electrónico, se envía una respuesta lo mas pronto posible.</h2>
                            <form action="https://formsubmit.co/jsbustos43@misena.edu.co" method="POST" class="needs-validation" novalidate>
                                <div class="input-comentario">
                                    <div>
                                        <input type="text" id="nombreComentario" name="nombreComentario" placeholder="Tu nombre" class="form-control" required>
                                        <div class="invalid-tooltip position-relative">Porfavor ingrese su nombre</div>
                                    </div>
                                    <div>
                                        <input type="email" id="emailComentario" name="emailComentario" placeholder="Tu Correo Electronico" class="form-control" required>
                                        <div class="invalid-tooltip position-relative">Porfavor ingrese su Correo</div>
                                    </div>
                                    <div>
                                        <textarea name="comentario" id="comentario" cols="35" rows="5" placeholder="Tu comentario" class="form-control" required></textarea>
                                        <div class="invalid-tooltip position-relative">Porfavor ingrese su comentario</div>
                                    </div>
                                    <button id="" type="submit" class="btn btn-primary enviar-comentario">Enviar</button>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <section id="section-contactanos">
        <div class="contenedor-contacto">
            <div class="col-lg-12">
                <div class="row">

                    <div class="contacto col-md-6" data-aos="zoom-out-up">
                        <div class="contacto-titulo">
                            <h1>CONTACTANOS</h1>
                        </div>
                        <form action="https://formsubmit.co/jsbustos43@misena.edu.co" method="POST" class="needs-validation" novalidate>
                            <div class="contacto-body">
                                <div class="contacto-body-nombres ">

                                    <div>
                                        <label for="nombreContacto" class="form-label" style="color: #fff; padding-top: 15px; text-align: center; width: 100%;">Nombre</label>
                                        <input type="text" id="nombreContacto" name="nombreContacto" placeholder="Tu nombre" class="form-control" required>
                                        <div class="invalid-tooltip position-relative">Porfavor ingrese su nombre</div>
                                    </div>
                                    <div>
                                        <label for="telefonoContacto" class="form-label" style="color: #fff; padding-top: 15px; text-align: center; width: 100%;">Telefono</label>
                                        <input type="text" id="telefonoContacto" name="telefonoContacto" placeholder="Tu telefono" class="form-control" required>
                                        <div class="invalid-tooltip position-relative">Porfavor ingrese su telefono</div>
                                    </div>

                                </div>
                                <div class="contacto-body-numeros">

                                    <div>
                                        <label for="apellidoContacto" class="form-label" style="color: #fff; padding-top: 15px; text-align: center; width: 100%;">Apellido</label>
                                        <input type="text" id="apellidoContacto" name="apellidoContacto" placeholder="Tu apellido" class="form-control" required>
                                        <div class="invalid-tooltip position-relative">Porfavor ingrese su apellido</div>
                                    </div>
                                    <div>
                                        <label for="correoContacto" class="form-label" style="color: #fff; padding-top: 15px; text-align: center; width: 100%;">Correo</label>
                                        <input type="text" id="correoContacto" name="correoContacto" placeholder="Tu correo" class="form-control" required>
                                        <div class="invalid-tooltip position-relative">Porfavor ingrese su correo</div>
                                    </div>

                                </div>
                                <div class="contacto-body-comentario ">
                                    <div>
                                        <label for="mensajeContacto" class="form-label" style="color: #fff; padding-top: 15px; text-align: center; width: 100%;">Mensaje</label>
                                        <textarea name="mensajeContacto" id="mensajeContacto" cols="" rows="8" placeholder="Tu mensaje" class="form-control" required></textarea>
                                        <div class="invalid-tooltip">Porfavor ingrese su mensaje...</div>
                                    </div>
                                </div>
                            </div>
                            <div class="contacto-footer">
                                <button type="submit" class="btn btn-primary enviar-comentario">Enviar</button>
                            </div>
                        </form>
                        
                    </div>
                    <div class="col-lg-6">
                        <div class="imagen-contacto" data-aos="zoom-out-left">
                            <img src="img/contactUs-amico.svg" alt="">
                        </div>
                    </div>
                </div>
            </div>
            
            

        </div>
    </section>



    <section>
        <div class="wave">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120"
                preserveAspectRatio="none">
                <path
                    d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z"
                    class="shape-fill"></path>
            </svg>
        </div>
    </section>




    <footer>
        <div class="diagonal-shadow"></div>
        <div class="footer-top">
            <div class="contenedor">
                <div class="row">
                    <div class="titulo-marca col-md-4">
                        <h1>MEDSAN <span style="font-size: 20px;">®</span></h1>
                        <h2>Empresa dedicada a la instalacion y mantenimiento de equipos de seguridad electronica para
                            todo tipo de necesidad locativa.</h2>
                    </div>
                    <div class="col-md-2 col-sm-6">
                        <h5 class="titulo-footer text-white">MENU</h5>
                        <ul class="subtitulos-footer list-unstyled">
                            <li><a href="#section-nosotros">Nosotros</a></li>
                            <li><a href="#section-productos">Productos</a></li>
                            <li><a href="#section-servicios">Servicios</a></li>
                            <li><a href="#section-contactanos">Contactanos</a></li>
                        </ul>
                    </div>
                    <div class="col-md-2 col-sm-6">
                        <h5 class="titulo-footer text-white">LEGAL</h5>
                        <ul class="subtitulos-footer list-unstyled">
                            <li><a data-bs-toggle="modal" data-bs-target="#politica-privacidad" href="">Politicas de privacidad</a></li>
                            <li><a data-bs-toggle="modal" data-bs-target="#politica-cookies" href="">Politica de las cookies</a></li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <h5 class="titulo-footer text-white">EMPRESA</h5>
                        <ul class="subtitulos-footer list-unstyled">
                            <li><span>medsan@seguridadelectronica.com.co</span></li>
                            <li><span>3002710009</span></li>
                            <li><span>Kra 92 #8c-36, Castilla, Kennedy, Bogotá D.C.</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="contenedor">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="socials">
                            <div class="copyright">
                                <h5>COPYRIGHT © 2021 SENA - Medsan Security® Todos los derechos reservados.</h5>
                            </div>
                            <ul>
                                <a href="https://www.facebook.com/seguridadelectronica.com.co"><i
                                        class="fa fa-facebook"></i></a>
                                <a href="https://www.instagram.com/medsansecurity2021/"><i
                                        class="fab fa-instagram"></i></a>
                                <a href="https://twitter.com/?lang=es"><i class="fa fa-twitter"></i></a>
                                <a href="https://www.linkedin.com/feed/"><i class="fa fa-linkedin-square"></i></a>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </footer>


    <!-- Boton de Whatsapp-->
    <a href="https://api.whatsapp.com/send?phone=3002710009&text=Hola%21%20Quisiera%20m%C3%A1s%20informaci%C3%B3n%20sobre%20Medsan%20."
        class="float" target="_blank">
        <i class="fa fa-whatsapp my-float"></i>
    </a>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous">
    </script>
    <script src="js/main.js"></script>


    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function () {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
            })
        })()
    </script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1200
        });
    </script>

</body>

</html>