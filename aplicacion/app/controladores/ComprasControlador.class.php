<?php
class ComprasControlador {

    public static function GenerarListado($req) {
        $s = new ComprasModelo();
        $suvs = $s->Listar();
        $html = "";
        foreach ($suvs as $suv) {
            $html .= <<<HTML
            <tr>
                <td>{$suv->nombre}</td>
                <td>{$suv->descripcion}</td>
                <td>{$suv->precio}</td>
                <td>{$suv->cantidad}</td>
                <td>{$suv->ganancia}</td>
                <td>{$suv->fechaCompra}</td>
            </tr>
            HTML;
        }
        generarHtml('ventas', $html);
    }

    public static function Comprar($req) {
        if ($req['post']['stock'] - $req['post']['cantidad'] < 0) throw new Exception("La cantidad de compra no puede superar el stock");
        $c = new ComprasModelo();
        $c->stock = $req['post']['stock'];
        $c->cantidad = $req['post']['cantidad'];
        $c->idSouvenir = $req['post']['id'];
        $c->Comprar();
        header("Location: /abm");
    }

}
    

