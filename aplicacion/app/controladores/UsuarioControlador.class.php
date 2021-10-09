<?php
require '../framework/autoloader.php';
class UsuarioControlador {

  public static function MostrarLogin($request) {
    return cargarVista("Login");
  }

  public static function IniciarSesion($request) {
    try {
      $u = new UsuarioModelo();
      $u->ci = $request['post']['ci'];
      $u->password = $request['post']['pass'];
      $u->Autenticar();
      $_SESSION['autenticado'] = true;
      header("Location: /");
    } catch (Exception $e) {
      echo "no se pudo iniciar sesion";
    }
  }
  public static function Logout(){
      $_SESSION['autenticado'] = null;
      header("Location: /");
  }
}
