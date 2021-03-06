<?php


namespace Poli\Tarjeta;

use PHPUnit\Framework\TestCase;

class TarjetaTest extends TestCase {

  public function testCargaSaldo() {
    $tarjeta = new Tarjetas("estudiante", "Medio boleto");
    $tarjeta->recargar(272);
    $this->assertEquals($tarjeta->saldo(), 320, "Cuando cargo 272 deberia tener finalmente 320");
  }


  public function testPagarViaje() {
	$bondi= new Colectivos("144");
	$tarje= new Tarjetas("estudiante", "Medio boleto");
	$tarje->recargar(272);
	$tarje->pagar($bondi,"18.52","15/09/2016");
	$this->assertEquals($tarje->saldo(), (320-4), "Cuando cargo 272 deberia tener finalmente 320 y paga 4 de pasaje");

  }
  public function testPagarBici() {
	$bici= new Bicicletas("1234");
	$tarje= new Tarjetas("normal", "movi estandar");
	$tarje->recargar(272);
	$tarje->pagar($bici,"18.52","15/09/2016");
	$this->assertEquals($tarje->saldo(), (320-12), "Cuando cargo 272 deberia tener finalmente 320 y pagar 12 de pasaje");
  	
  }

  public function testPaseLibre() {
	$bondi= new Colectivos("144");
	$tarje= new Tarjetas("pase libre", "movi con pase");
	$tarje->recargar(20);
	$tarje->pagar($bondi,"18.52","15/09/2016");
	$this->assertEquals($tarje->saldo(),20-0,"Se recargo 20 ycomo es pase libre se paga 0");
  }

  public function testTransbordo() {
	$bondi= new Colectivos("144");
	$tarje= new Tarjetas("estudiante", "Medio boleto");
	$tarje->recargar(272);
	$tarje->pagar($bondi,"21.52","30/09/2016");
	
	$bondi2= new Colectivos("128");
	$tarje->pagar($bondi2,"22.05","30/09/2016");
	$this->assertEquals($tarje->saldo(), (320-1.32-4), "cargo 272, pero se cargan 320. El primer viaje me sale 4 y el segundo 1,32");
  }
	
  public function testBoleto() {
	$bondi= new Colectivos("144");
	$tarje= new Tarjetas("estudiante", "Medio boleto");
	$tarje->recargar(272);
	$tarje->pagar($bondi,"21.52","30/09/2016");
	$bole=new Boleto();
	$this->assertEquals($bole->mostrarinfo(),(TERMINAR
	  
  }

  public function testNoTransbordo() {

  }

}
