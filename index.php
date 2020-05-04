<?php
    require_once "plantilla.php";
    if(isset($_GET["url"])){
        if($_SERVER["REQUEST_METHOD"]=="GET"){
            $ruta=$_GET["url"];
            $numero=intval(preg_replace('/[^0-9]+/','',$ruta),10);
            switch ($ruta) {
                case 'domicilios':
                    $respuesta=plantilla::mdlMostrarDomiciliosPendiente();
                    echo json_encode($respuesta);
                    http_response_code(200);
                break;
                case 'domicilios/'.$numero:
                    $respuesta=plantilla::mdlMostrarDomiciliosPendienteById($numero);
                    echo json_encode($respuesta);
                    http_response_code(200);
                break;
                case 'misdomicilios/'.$numero:
                    $respuesta=plantilla::mdlMostrarMisDomicilios($numero);
                    echo json_encode($respuesta);
                    http_response_code(200);
                break;
               
                default:
                    # code...
                break;
            }
        }else if($_SERVER["REQUEST_METHOD"]=="PUT"){
            $ruta=$_GET["url"];
            $numero=intval(preg_replace('/[^0-9]+/','',$ruta),10);
            $postBody=file_get_contents('php://input');
            $convert=json_decode($postBody,true);
            if(json_last_error()==0){
                switch ($ruta) {
                    case 'domicilios':
                        $respuesta=plantilla::mdlMostrarEscogerDomicilio($convert);
                        echo json_encode($respuesta);
                        http_response_code(200);
                    break;
                   
                    default:
                        # code...
                    break;
                }
            }else{
                http_response_code(400);
            }
     
        }else{
          http_response_code(405);  
        }
    }else{
        ?>
            <link rel="stylesheet" href="estilos.css" type="text/css">
            <div class="container">
                <h1>Metadata</h1>
                <div class="divbody">
                <p>Domicilios</p>
                <code>POST /domicilios </code>
                <code>GET /domicilios </code>
                <br>
                <code>GET /domicilios/$id </code>
                </div>
            </div>
        <?php
    }