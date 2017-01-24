<?php
  require_once '../Model/Articulo.php';
  require_once 'twig/lib/Twig/Autoloader.php';
  Twig_Autoloader::register();
  $loader = new Twig_Loader_Filesystem(__DIR__.'/../View');
  $twig = new Twig_Environment($loader);
  

// Guardamos en data la lista de objetos que nos devuelve la base de datos.
$data["articulos"] = Articulo::getArticulos();
// Mostramos el listado usando la plantilla twig
echo $twig->render('listado.html.twig', $data);