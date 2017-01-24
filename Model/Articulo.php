<?php

require_once 'BlogDB.php';

class Articulo {
  private $id;
  private $titulo;
  private $contenido;
  private $fecha;
  
  function __construct($id, $titulo, $contenido, $fecha) {
    $this->id = $id;
    $this->titulo = $titulo;
    $this->contenido = $contenido;
    $this->fecha = $fecha;
  }

  public function getId() {
    return $this->id;
  }

  public function getTitulo() {
    return $this->titulo;
  }

  public function getContenido() {
    return $this->contenido;
  }

  public function getFecha() {
    return $this->fecha;
  }  
  
   // Funcion setter para modificar todos los atributos. En caso de que haya alguno que no se quiera
    // modificar simplemente se deja en blanco con comillas
    public function setter($titulo="", $contenido="", $fecha="") {
        
        // Si el titulo no esta vacio ni es nulo, se lo asignamos como atributo
        if ($titulo !== "" && $titulo !== null) {
            $this->titulo = $titulo;
        }
        
        
        if ($contenido !== "" && $contenido !== null) {
            $this->contenido = $contenido;
        }
        
        
        
        // Si el titulo no esta vacio ni es nulo, se lo asignamos como atributo
        if ($fecha !== "" && $fecha !== null) {
            $this->fecha = $fecha;
        }
        
        
        
    }
  
  public function insert() {
    $conexion = BlogDB::connectDB();
    $insercion = "INSERT INTO articulo (titulo, contenido) VALUES (\"".$this->titulo."\", \"".$this->contenido."\")";
    $conexion->exec($insercion);
  }

  public function delete() {
    $conexion = BlogDB::connectDB();
    $borrado = "DELETE FROM articulo WHERE id=\"".$this->id."\"";
    $conexion->exec($borrado);
  }
  
  public function update() {
    $conexion = BlogDB::connectDB();
    $modificado = "UPDATE articulo SET titulo = \"".$this->titulo."\", contenido = \"".$this->contenido."\" WHERE id = \"".$this->id."\"";
    $conexion->exec($modificado);
  }
  
  public static function getArticulos() {
    $conexion = BlogDB::connectDB();
    $seleccion = "SELECT id, titulo, contenido, fecha FROM articulo";

    $consulta = $conexion->query($seleccion);
    
    $articulos = [];
    
    while ($registro = $consulta->fetchObject()) {
      $articulos[] = new Articulo($registro->id, $registro->titulo, $registro->contenido, $registro->fecha);
    }
   
    return $articulos;    
  }
  
  public static function getArticulosById($id) {
    $conexion = BlogDB::connectDB();
    $seleccion = "SELECT id, titulo, contenido, fecha FROM articulo WHERE id=\"".$id."\"";
    $consulta = $conexion->query($seleccion);
    $registro = $consulta->fetchObject();
    $articulo = new Articulo($registro->id, $registro->titulo, $registro->contenido, $registro->fecha);
       
    return $articulo;    
  }
}
