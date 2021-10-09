<?php
require '../config.php';
spl_autoload_register(function ($clase) {
    if (file_exists("../app/modelos/$clase.class.php"))
        require "../app/modelos/$clase.class.php";
    if (file_exists("../app/rutas/$clase.class.php"))
        require "./app/rutas/$clase.class.php";
    if (file_exists("../app/controladores/$clase.class.php"))
        require "../app/controladores/$clase.class.php";
    if (file_exists("../framework/$clase.class.php"))
        require "../framework/$clase.class.php";
    if (file_exists("../middlewares/$clase.class.php"))
      
        require "../middlewares/$clase.class.php";
});

require_once '../framework/render.class.php';
date_default_timezone_set("America/Argentina/Buenos_Aires");
session_start();
