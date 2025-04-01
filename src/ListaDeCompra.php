<?php

namespace Deg540\DockerPHPBoilerplate;

class ListaDeCompra
{
    private string $lista = "";
    public function instruccion (string $instruccion) : string
    {
        if(str_contains($instruccion, "añadir")){
            $partes = explode(" ", $instruccion);
            if(count($partes) > 2) {
                if(empty($this->lista)) {
                    $this->lista = $partes[1] . " x" . $partes[2];
                    return $this->lista;
                }
                $this->lista = $partes[1] . " x" . $partes[2] . ", " . $this->lista;
                return $this->lista;
            }
            if(empty($this->lista)) {
                $this->lista = $partes[1] . " x1";
                return $this->lista;
            }
            $this->lista = $partes[1] . " x1" . ", " . $this->lista;
            return $this->lista;
        }
        return "";
    }
}