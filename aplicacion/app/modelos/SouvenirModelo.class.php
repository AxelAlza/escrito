<?php

class SouvenirModelo extends Modelo {
    public $id;
    public $nombre;
    public $descripcion;
    public $stock;
    public $precio;
    public $fechaAlta;

    public function Insertar() {
        $sql = "Insert into Souvenirs (nombre,descripcion,stock,precio) values (? , ? , ? , ?)";
        $this->sentencia = $this->conexion->prepare($sql);
        $this->sentencia->bind_param('ssii' , $this->nombre,$this->descripcion,$this->stock,$this->precio);
        $this->sentencia->execute();
    }
    public function Update() {
        $sql = "Update Souvenirs set nombre = ?, descripcion = ?, stock = ?, precio = ? where id = ?";
        $this->sentencia = $this->conexion->prepare($sql);
        $this->sentencia->bind_param('ssiii' ,$this->nombre,$this->descripcion,$this->stock,$this->precio,$this->id);
        $this->sentencia->execute();
    }
    public function Delete() {
        $sql = "Delete from Souvenirs where id = ?";
        $this->sentencia = $this->conexion->prepare($sql);
        $this->sentencia->bind_param('i' , $this->id);
        $this->sentencia->execute();
    }

    public function Select(){
        $sql = "Select * from Souvenirs where id = ?";
        $this->sentencia = $this->conexion->prepare($sql);
        $this->sentencia->bind_param("i" , $this->id);
        $this->sentencia->execute();
        $resultado = $this->sentencia->get_result();
        while ($suv = mysqli_fetch_object($resultado, "SouvenirModelo")) {
            return $suv;
        }
    }

    public function Listar(){
        $souvenires = array();
        $sql = "Select * from Souvenirs";
        $this->sentencia = $this->conexion->prepare($sql);
        $this->sentencia->execute();
        $resultado = $this->sentencia->get_result();
        while ($suv = mysqli_fetch_object($resultado, "SouvenirModelo")) {
            array_push($souvenires, $suv);
        }
        return $souvenires;
    }
}
