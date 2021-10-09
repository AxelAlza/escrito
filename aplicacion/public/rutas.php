<?php
require '../framework/autoloader.php';
require '../config.php';

Routes::Add('/', 'get', 'SouvenirControlador::GenerarListado');
Routes::Add('/abm', 'get', 'SouvenirControlador::GenerarListadoABM', 'auth::EstaAutenticado');
Routes::Add('/nuevo','get', 'SouvenirControlador::MostrarFormulario','auth::EstaAutenticado');
Routes::Add('/nuevo','post','SouvenirControlador::Insertar', 'auth::EstaAutenticado');
Routes::Add('/modificar','get','SouvenirControlador::MostrarFormularioMod', 'auth::EstaAutenticado');
Routes::Add('/modificar','post','SouvenirControlador::Modificar', 'auth::EstaAutenticado');
Routes::Add('/eliminar', 'get', 'SouvenirControlador::Borrar', 'auth::EstaAutenticado');
Routes::Add('/comprar', 'get', 'SouvenirControlador::MostrarFormularioCompra', 'auth::EstaAutenticado');
Routes::Add('/comprar', 'post', 'ComprasControlador::Comprar', 'auth::EstaAutenticado');
Routes::Add('/ventas', 'get', 'ComprasControlador::GenerarListado', 'auth::EstaAutenticado');

Routes::Add('/logout' ,'get', 'UsuarioControlador::Logout');
Routes::Add('/login', 'get', 'UsuarioControlador::MostrarLogin');
Routes::Add('/login' ,'post','UsuarioControlador::IniciarSesion');
Routes::Run();

