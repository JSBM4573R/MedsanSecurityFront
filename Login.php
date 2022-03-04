<?php
    include_once 'database1.php';
    
    session_start();

    // if(isset($_GET['cerrar_sesion'])){
    //     session_unset(); 

    //     // destroy the session 
    //     session_destroy(); 
    // }
    
    // if(isset($_SESSION['rol'])){
    //     switch($_SESSION['rol']){
    //         case 1:
    //             header('location: Empresa.php');
    //         break;

    //         case 2:
    //         header('location: Cliente.php');
    //         break;

    //         default:
    //     }
    // }

    require 'database1.php';
  
    if (!empty($_POST['email']) && !empty($_POST['password'])) {
      $records = $conn->prepare('SELECT *FROM usuarios WHERE email = :email');
      $records->bindParam(':email', $_POST['email']);
      $records->execute();

      $row = $records->fetch(PDO::FETCH_NUM);
        
      if($row == true){
          $rol = $row[7];
          
          $_SESSION['rol'] = $rol;
          switch($rol){
              case 1:
                // "<script>
                //     alert('BIENVENIDO');
                //     window.location = 'Empresa.php';
                // </script>";
                header('location: EmpresaDashboard.html');
              break;

              case 2:
                // "<script>
                //     alert('BIENVENIDO');
                //     window.location = 'Cliente.php';
                // </script>";
                header('location: ClienteDashboard.html');
              break;

              default:
          }
      }else{
          // no existe el usuario
          echo "Nombre de usuario o contraseña incorrecto";
      }

    }

    // if(isset($_POST['email']) && isset($_POST['password'])){
    //     $email = $_POST['email'];
    //     $password = $_POST['password'];

    //     $db = new Database();
    //     $query = $db->connect()->prepare('SELECT *FROM usuarios WHERE email = :email AND password = :password');
    //     $query->execute(['email' => $email, 'password' => $password]);

    //     $row = $query->fetch(PDO::FETCH_NUM);
        
    //     if($row == true){
    //         $rol = $row[3];
            
    //         $_SESSION['rol'] = $rol;
    //         switch($rol){
    //             case 1:
    //                 header('location: Empresa.php');
    //             break;

    //             case 2:
    //             header('location: Cliente.php');
    //             break;

    //             default:
    //         }
    //     }else{
    //         // no existe el usuario
    //         echo "Nombre de usuario o contraseña incorrecto";
    //     }
        

    // }

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>LingStar</title>

    <!-- Meta Tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Estilos -->
    <link rel="shortcut icon" href="img/LSbW.png">
    <link rel="stylesheet" href="css/styleLogin.css">
    <link rel="stylesheet" href="css/styleWsp.css">
    <script src="https://kit.fontawesome.com/2cb25f2c39.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>

<body>
    <?php require 'encabezado.php' ?>
    
    <!-- containt -->
    <div class="banner-text">
        <h2> LINGSTAR</h2>
        <h1>Haz Tu <span>Reserva</span></h1>
        <br>
        <h3>Inicia sesión</h3>
        <br>
        <a href="#" class="button1" onclick="togglePopupCliente()">Cliente</a>
        <a href="#" class="button2" onclick="togglePopupEmpresa()">Empresa</a>
    </div>

    <!-- Login Cliente -->
    <div class="popup" id="popup-cliente">
        <div class="content">
            <div class="close-btn" onclick="togglePopupCliente()">
                <a href="#">X</a>
            </div>
            <h1>Cliente</h1>

            <form action="Login.php" method="POST">
                <div class="input-field">
                    <input class="datos" type="email" name="email" placeholder="Tu correo" require>
                    <input class="datos" type="password" name="password" placeholder="Tu contraseña" require>
                    <input class="second-button" type="submit" name="submit" value="Ingresar">
                </div>

                <p> ¿no estas registrato?
                    <a href="formularioCliente.php" class="validate">Registrate aquí!</a>
                </p>
            </form>
        </div>
    </div>
    

    <!-- Login Empresa -->
    <div class="popup" id="popup-Empresa">
        <div class="content">
            <div class="close-btn" onclick="togglePopupEmpresa()">
                <a href="#">X</a>
            </div>
            <h1>Empresa</h1>
    
            <form action="Login.php" method="POST">
                <div class="input-field">
                    <input class="datos" type="email" name="email" placeholder="Tu correo" require>
                    <input class="datos" type="password" name="password" placeholder="Tu contraseña" require>
                    <input class="second-button" type="submit" name="submit" value="Ingresar">
                </div>
            </form>

            <p> ¿no estas registrato?
                <a href="formularioEmpresa.php" class="validate">Registrate aquí!</a>
            </p>
        </div>
    </div>

    <!-- Funcion togglePopup -->
    <script>
        function togglePopupCliente() {
            document.getElementById("popup-cliente")
                .classList.toggle("active")
        }

        function togglePopupEmpresa() {
            document.getElementById("popup-Empresa")
                .classList.toggle("active")
        }
    </script>
        <!-- Boton de Whatsapp-->
        <a href="https://api.whatsapp.com/send?phone=5195508107&text=Hola%21%20Quisiera%20m%C3%A1s%20informaci%C3%B3n%20sobre%20Varela%202." class="float" target="_blank">
        <i class="fa fa-whatsapp my-float"></i>
    </a>
</body>

</html>