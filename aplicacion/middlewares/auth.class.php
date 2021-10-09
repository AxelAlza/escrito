<?php 

    require '../framework/autoloader.php';

    class auth {
        public static function EstaAutenticado($contextoMiddleware){
            if(isset($_SESSION['autenticado'])){
                $contexto = [[
                    'post' => $contextoMiddleware['post'],
                    'get' => $contextoMiddleware['get'],
                    'server' => $contextoMiddleware['server']
                ]];
                call_user_func_array($contextoMiddleware['funcion'],$contexto);
            }
            else{
                header("Location: /login");
                return;
            }
        }

        public static function EstaAutenticadoView($contextoMiddleware){
            if(isset($_SESSION['autenticado'])){
                cargarVista($contextoMiddleware['vista']);
            }
            else{
                header("Location: /login");
                return;
            }
        }
    }