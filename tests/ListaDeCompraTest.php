<?php

use Deg540\DockerPHPBoilerplate\Calculator;
use PHPUnit\Framework\TestCase;
use Deg540\DockerPHPBoilerplate\ListaDeCompra;

class ListaDeCompraTest extends TestCase
{

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

    /**
     * @test
     */
    public function eliminarUnProductosDeLaListaConVariosProductos()
    {
        $carrito = new ListaDeCompra();

        $carrito->instruccion("añadir pan 2");
        $carrito->instruccion("añadir cocacola 3");
        $carrito->instruccion("añadir leche 2");

        $result = $carrito->instruccion("eliminar pan");

        $this->assertEquals("leche x2, cocacola x3", $result);
    }

    /**
     * @test
     */
    public function eliminarUnProductosQueNoExisteDeLaLista()
    {
        $carrito = new ListaDeCompra();

        $carrito->instruccion("añadir pan 2");
        $carrito->instruccion("añadir cocacola 3");
        $carrito->instruccion("añadir leche 2");

        $result = $carrito->instruccion("eliminar agua");

        $this->assertEquals("El producto seleccionado no existe", $result);
    }
}