<?php

namespace Deg540\DockerPHPBoilerplate;

class ListaDeCompra
{
    private string $lista = "";
    public function instruccion (string $instruccion) : string
    {
        $partes = explode(" ", $instruccion);

        if(str_contains($instruccion, "añadir")) {
            if (str_contains($this->lista, $partes[1])) {
                $productos = explode(",", $this->lista);
                $aux = "";
                foreach ($productos as $producto) {
                    if (!str_contains($producto, $partes[1])) {
                        if(empty($aux)) {
                            $aux = $producto;
                        } else {
                            $aux = $aux . "," .$producto;
                        }
                    } else {
                        $aux2 = explode(" ", $producto);
                        $aux = $aux . ", " . $aux2[1] . " x" . ($aux2[2][1] + intval($partes[2]));
                    }
                }
                $this->lista = $aux;
                return $this->lista;
            }
            if (count($partes) > 2) {
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
        } elseif (str_contains($instruccion, "eliminar")) {
            if (!str_contains($this->lista, $partes[1])) {
                return "El producto seleccionado no existe";
            }
            $productos = explode(",", $this->lista);
            $aux = "";
            foreach ($productos as $producto) {
                if (!str_contains($producto, $partes[1])) {
                    if(empty($aux)) {
                        $aux = $producto;
                    } else {
                        $aux = $aux . "," .$producto;
                    }
                }
            }
            $this->lista = $aux;
            return $this->lista;
        }
    }
}