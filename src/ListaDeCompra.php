<?php

namespace Deg540\DockerPHPBoilerplate;

class ListaDeCompra
{
    public function instruccion (string $instruccion) : string
    {
        if(str_contains($instruccion, "añadir")){
            $partes = explode(" ", $instruccion);
            return $partes[1] . " x1";
        }
        return "";
    }
}