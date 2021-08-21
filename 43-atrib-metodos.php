<?php

//  1- Create class:

class Car{
  

    private $marca;
    private $modelo;
    private $motor;
    private $ano;

    //   os Getters and Setters

    public function getMarca(){

        return $this->marca;

    }

    public function setMarca($marca){

        $this->marca = $marca;
    }

    public function getModelo(){

        return $this->modelo;
    }

    public function setModelo($modelo){

        $this->modelo = $modelo;  //a primeira palavra modelo poderia ser outra, não tem a ver com o $modelo da linha 11.

    }

    public function getMotor():float{

        return $this->motor;

    }

    public function setMotor($motor){

        $this->motor = $motor;

    }

    public function getAno():int{

        return $this->ano;

    }

    public function setAno($ano){

        $this->ano = $ano;

    }

    public function exibeCarro(){

        return array(
            "marca"=>$this->getMarca(),
            "modelo"=>$this->getModelo(),
            "motor"=>$this->getMotor(),
            "ano"=>$this->getAno()
        );
    }

};

$chd1404 = new Car();
$chd1404->setMarca("Fiat");
$chd1404->setModelo("Palio SE");
$chd1404->setMotor("1.0");
$chd1404->setAno("1997");

var_dump($chd1404->exibeCarro());
echo '<br>';
print_r($chd1404->exibeCarro());




?>