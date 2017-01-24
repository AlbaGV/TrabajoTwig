<?php

    // Importamos las clases Articulo y el Autoloader de twig
require_once '../Model/Articulo.php';
require_once 'twig/lib/Twig/Autoloader.php';
// Inicializamos Twig
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem(__DIR__.'/../View');
$twig = new Twig_Environment($loader);
// Si el formulario se ha mandado, procedemos a insertar el nuevo articulo
if (isset($_POST["accion"])) {
    
    
    // Creamos un nuevo objeto con la informacion del formulario
    $articulo = new Articulo("",$_POST["tituloAdd"], $_POST["contenidoAdd"],"");
    
    // Insertamos el objeto en la base de datos
    $articulo->insert();
    
    // Volvemos a index.php
    header('Location: ../Controller/index.php');
    
} else { // Si no se ha mandado el formulario lo cargamos
//
    // Cargamos la plantilla twig
    echo $twig->render('formularioArticulo.html.twig');
}