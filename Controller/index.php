<?php
  require_once '../Model/Articulo.php';
  require_once 'twig/lib/Twig/Autoloader.php';
  Twig_Autoloader::register();
  $loader = new Twig_Loader_Filesystem(__DIR__.'/../View');
  $twig = new Twig_Environment($loader);
  foreach($data['articulos'] as $articulo)  {

      $articulo = [
        'titulo' => 'getTitulo()',
        'fecha' => 'getFecha()',
        'contenido' => 'getContenido()',
        ];
  }

  echo $twig->render('listado.html.twig', $articulo);
