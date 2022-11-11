<?php
if (isset($_POST["Enviar Imagen"])) {
    $nombreDirectorio = "archivo";
    $nombre_archivo_cliente = $_FILES['nombre_archivo_cliente']['name'];
    if (isset($nombre_archivo_cliente) && $nombre_archivo_cliente != "") {
        $tipo = $_FILES['nombre_archivo_cliente']['type'];
        $tamano = $_FILES['nombre_archivo_cliente']['size'];
        $temp = $_FILES['nombre_archivo_cliente']['tmp_name'];
        if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 1000000))) {
         echo '<div><b>Error. La extensión o el tamaño de los archivos no es correcta.<br/>
         - Se permiten archivos .gif, .jpg, .png. y de 200 kb como máximo.</b></div>';
        }
        else {
            if (move_uploaded_file($temp, 'images/'.$nombre_archivo_cliente)) {
                chmod('images/'.$nombre_archivo_cliente, 0777);
                echo "El archivo se ha subido satisfatoriamente al directorio $nombreDirectorio <br>";
                echo '<p><img src="images/'.$nombre_archivo_cliente.'"></p>';
            }
            else {
                echo "No se ha podido subir el archivo <br>";
            }
        }
    }
 }

/*if (is_uploaded_file ($_FILES['nombre_archivo_cliente']['tmp_name'])){
    $nombreDirectorio = "archivo";
    $nombrearchivo = $_FILES['nombre_archivo_cliente']['name'];
    $nombreCompleto = $nombreDirectorio . $nombrearchivo;
    if (is_file($nombreCompleto)){
        $idUnico = time();
        $nombrearchivo = $idUnico . "-" . $nombrearchivo;
            echo "Archivo repetido, se cambiara el nombre a $nombrearchivo <br><br>";
    }
    move_uploaded_file ($_FILES['nombre_archivo_cliente']['tmp_name'],$nombreDirectorio . $nombrearchivo);

    echo "El archivo se ha subido satisfatoriamente al directorio $nombreDirectorio <br>";
}
else 
    echo "No se ha podido subir el archivo <br>"*/
?>