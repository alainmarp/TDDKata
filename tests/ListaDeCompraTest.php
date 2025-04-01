<?php

use Deg540\DockerPHPBoilerplate\Calculator;
use PHPUnit\Framework\TestCase;
use Deg540\DockerPHPBoilerplate\ListaDeCompra;

class ListaDeCompraTest extends TestCase
{
    /**
     * @test
     */
    public function añadirUnProductoALaLista()
    {
        $carrito = new ListaDeCompra();

        $result = $carrito->instruccion("añadir pan");

        $this->assertEquals("pan x1", $result);
    }

    /**
     * @test
     */
    public function eliminarUnicoProductoExistenteDeLaLista()
    {
        $carrito = new ListaDeCompra();

        $result = $carrito->instruccion("eliminar pan");

        $this->assertEquals("", $result);
    }

    /**
     * @test
     */
    public function añadirUnProductoALaListaConCantidadPersonalizada()
    {
        $carrito = new ListaDeCompra();

        $result = $carrito->instruccion("añadir pan 3");

        $this->assertEquals("pan x3", $result);
    }

    /**
     * @test
     */
    public function añadirVariosProductosALaLista()
    {
        $carrito = new ListaDeCompra();

        $carrito->instruccion("añadir pan 2");
        $result = $carrito->instruccion("añadir cocacola 3");

        $this->assertEquals("cocacola x3, pan x2", $result);
    }
}