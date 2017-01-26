<?php
  // Importamos las clases Articulo y el Autoloader de twig
require_once '../Model/Articulo.php';
require_once 'twig/lib/Twig/Autoloader.php';
// Inicializamos Twig
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem(__DIR__.'/../View');
$twig = new Twig_Environment($loader);
// Si el formulario ha sido mandado procedemos a modificar el registro en la base de datos
if (isset($_POST["update"])) {
    
    // Recogemos el articulo deseado de la base de datos por su ID
    $articulo = Articulo::getArticulosById($_POST["updateId"]);
    
    
    
    $articulo->setter($_POST["updateTitulo"], $_POST["updateContenido"]);
    // Le hacemos un update para modificarlo en la base de datos
    $articulo->update();
    
   
    
    // Regresamos a index
    header('Location: ../Controller/index.php');
    
} else { // En el caso de que no se haya mandado el formulario lo mostramos
    // Datos del articulo a modificar para pasar por la plantilla twig
    $data["id"] = $_POST["updateId"];
    $data["titulo"] = $_POST["updateTitulo"];
    $data["contenido"] = $_POST["updateContenido"];
    
    
    // Mostramos el formulario mediante la plantilla twig
    echo $twig->render('formularioModificar.html.twig', $data);
}