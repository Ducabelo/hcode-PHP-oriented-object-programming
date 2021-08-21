<?php

class Pessoa{

    public $nome;  //atributo

    public function falar(){  //Uma função dentro de uma classe é um método.

        return "O meu nome é ".$this->nome;

    }
}

// Para chamar a classe e o objeto:

$eduardo = new pessoa();
$eduardo->nome = "Eduardo Henrique de Assis";
echo $eduardo->falar();
?>