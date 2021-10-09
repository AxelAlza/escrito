<?php
class SouvenirControlador {

    public static function GenerarListado($req) {
        $s = new SouvenirModelo();
        $suvs = $s->Listar();
        $html = "";
        foreach ($suvs as $suv) {
            $html .= <<<HTML
            <tr>
                <td>{$suv->id}</td>
                <td>{$suv->nombre}</td>
                <td>{$suv->descripcion}</td>
                <td>{$suv->stock}</td>
                <td>{$suv->precio}</td>
                <td>{$suv->fechaAlta}</td>
                <td><button><a href = "/comprar?id={$suv->id}">Comprar</a></button></td>
            </tr>
            HTML;
        }
        generarHtml('inicio', $html);
    }

    public static function GenerarListadoABM($req) {
        $s = new SouvenirModelo();
        $suvs = $s->Listar();
        $html = "";
        foreach ($suvs as $suv) {
            $html .= <<<HTML
            <tr>
                <td>{$suv->id}</td>
                <td>{$suv->nombre}</td>
                <td>{$suv->descripcion}</td>
                <td>{$suv->stock}</td>
                <td>{$suv->precio}</td>
                <td>{$suv->fechaAlta}</td>
                <td><button><a href="/modificar?id={$suv->id}" >Modificar</a></button><button><a href="/eliminar?id={$suv->id}">Eliminar</a ></button></td>
            </tr>
            HTML;
        }
        generarHtml('ABM', $html);
    }


    public static function Insertar($req) {
        $s = new SouvenirModelo();
        $s->nombre = $req['post']['nombre'];
        $s->descripcion = $req['post']['descripcion'];
        $s->stock = $req['post']['stock'];
        $s->precio = $req['post']['precio'];
        $s->Insertar();
        header("Location: /abm");
    }
    public static function Borrar($req) {
        $req['get']['id'];
        $s = new SouvenirModelo();
        $s->id = $req['get']['id'];
        $s->Delete();
        header("Location: /abm");
    }
    public static function Modificar($req) {
     
        $s = new SouvenirModelo();
        $s->id = $req['post']['id'];
        $s->nombre = $req['post']['nombre'];
        $s->descripcion = $req['post']['descripcion'];
        $s->stock = $req['post']['stock'];
        $s->precio = $req['post']['precio'];
        $s->Update();
        header("Location: /abm");
    }

    public static function MostrarFormularioCompra($req) {
        $suv = new SouvenirModelo();
        $suv->id = $req['get']['id'];
        $s = $suv->Select();
        generarHtml('comprar', [ 'id' => $s->id  , 'stock' => $s->stock , 'nombre' => $s->nombre]);
    }

    public static function MostrarFormulario($req) {
        cargarVista('nuevo');
    }
    public static function MostrarFormularioMod($req) {
        generarHtml('modificar' , $req['get']['id']);
    }
}
