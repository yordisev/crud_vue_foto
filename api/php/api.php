<?php

    require_once "conexion.php";
    $alumno = new ApptivaDB();

    function permisos() {  
        if (isset($_SERVER['HTTP_ORIGIN'])){
            header("Access-Control-Allow-Origin: *");
            header("Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS");
            header("Access-Control-Allow-Headers: Origin, Authorization, X-Requested-With, Content-Type, Accept");
            header('Access-Control-Allow-Credentials: true');      
        }  
        if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS'){
          if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))          
              header("Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS");
          if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
              header("Access-Control-Allow-Headers: Origin, Authorization, X-Requested-With, Content-Type, Accept");
          exit(0);
        }
    }
    permisos();

    $resultado = array('verificar' => true);
    $evento = $_GET['evento'];

    switch($evento){
        case 'mostrar':
            $alumnos = $alumno->buscar();
            if($alumnos){
                $resultado['alumnos'] = $alumnos;
                $resultado['mensaje'] = "Informacion mostrada";
            } else {
                $resultado['mensaje'] = "Aun no hay registro";
                $resultado['verificar'] = false;
            }
            break;
            case 'insertar':
                $dni = $_POST['dni'];
                $nombres = $_POST['nombres'];
                $appaterno = $_POST['appaterno'];
                $apmaterno = $_POST['apmaterno'];
                $celular = $_POST['celular'];
                $correo = $_POST['correo'];
                $foto = $_FILES['foto']['name'];
                $alumnos = $alumno->buscar();

                $target_dir = "../img/";
                $target_file = $target_dir.basename($foto);
                copy($_FILES['foto']['tmp_name'], $target_file);

                $u = $alumno->insertar($dni,$nombres,$appaterno,$apmaterno,$celular,$correo,$foto);

                if($u){
                    $resultado['mensaje'] = "Agregado Correctamente";
                } else {
                    $resultado['mensaje'] = "Problema al Agregar el Alumno";
                    $resultado['verificar'] = false;
                }
                break;

                case 'editar':
                    $dni = $_POST['edni'];
                    $nombres = $_POST['enombres'];
                    $appaterno = $_POST['eappaterno'];
                    $apmaterno = $_POST['eapmaterno'];
                    $celular = $_POST['ecelular'];
                    $correo = $_POST['ecorreo'];
                    $foto = "";
                //   print_r($dni);
                    if (isset($_FILES['efoto']['name'])){
                        $foto = $_FILES['efoto']['name'];
                        $target_dir = "../img/";
                        $target_file = $target_dir.basename($foto);
                        copy($_FILES['efoto']['tmp_name'], $target_file);
                    }
    
                    $u = $alumno->editar($dni,$nombres,$appaterno,$apmaterno,$celular,$correo,$foto);
                    if($u){
                        $resultado['mensaje'] = "Editado Correctamente";
                    } else {
                        $resultado['mensaje'] = "No se edito el Alumno";
                        $resultado['verificar'] = false;
                    }
                    break;
                    case 'eliminar':
                        $dni = $_POST['ddni'];
                        $u = $alumno->eliminar($dni);
                        if($u){
                            $resultado['mensaje'] = "Alumno Eliminado Correctamente";
                        } else {
                            $resultado['mensaje'] = "No se logro Eliminar el Alumno";
                            $resultado['verificar'] = false;
                        }
                        break;
    }

echo json_encode($resultado);
exit();
