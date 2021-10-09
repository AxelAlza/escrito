<?php

class ComprasModelo extends Modelo{
    public $idSouvenir;
    public $nombre;
    public $descripcion;
    public $stock;
    public $precio;
    public $cantidad;
    public $ganancia;
    
    public function Listar(){
        $compras = array();
        $sql = "Select nombre,descripcion,precio,cantidad,fechaCompra from Compras inner join Souvenirs on Compras.idSouvenir = Souvenirs.id";
        $this->sentencia = $this->conexion->prepare($sql);
        $this->sentencia->execute();
        $resultado = $this->sentencia->get_result();
        while ($c = mysqli_fetch_object($resultado, "SouvenirModelo")) {
            array_push($compras, $c);
        }
        return $compras;
    }

    public function Comprar(){
        $disponible = $this->stock - $this->cantidad;
        $sql = "Call Comprar(?,?,?)";
        $this->sentencia = $this->conexion->prepare($sql);
        $this->sentencia->bind_param("iii",$this->idSouvenir,$this->cantidad,$disponible);
        $this->sentencia->execute();

    }

}
