<?php
// Métodos estáticos. 
// São métodos que permitem que atributos ou métodos possam ser chamados
// sem precisar criar uma nova representação de uma classe ou objeto.

// 1 - Criando uma classe:
class Document {

    // 2 - Definir atributos.
    private $number;

    // 3 - Getters and Setters.
    public function getNumber(){

        return $this->number;
    }

    public function setNumber($number){
        
        $result = Document::verifyCpf($number); // os :: para que a função estática chame a classe sem precisar criar um objeto.

        if ($result === false){  

                throw new Exception("No valid CPF informed.", 1);  
        }
        
        $this->number = $number;
    }

    // Verificação de CPF - Código da aula.
    public static function verifyCpf($cpf):bool{

            // Verifica se um número foi informado
            if(empty($cpf)) {
                return false;
            }
        
            // Elimina possivel mascara
            $cpf = preg_replace("/[^0-9]/", "", $cpf);
            $cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);
            
            // Verifica se o numero de digitos informados é igual a 11 
            if (strlen($cpf) != 11) {
                return false;
            }
            // Verifica se nenhuma das sequências invalidas abaixo 
            // foi digitada. Caso afirmativo, retorna falso
            else if ($cpf == '00000000000' || 
                $cpf == '11111111111' || 
                $cpf == '22222222222' || 
                $cpf == '33333333333' || 
                $cpf == '44444444444' || 
                $cpf == '55555555555' || 
                $cpf == '66666666666' || 
                $cpf == '77777777777' || 
                $cpf == '88888888888' || 
                $cpf == '99999999999') {
                return false;
             // Calcula os digitos verificadores para verificar se o
             // CPF é válido
             } else {   
                
                for ($t = 9; $t < 11; $t++) {
                    
                    for ($d = 0, $c = 0; $c < $t; $c++) {
                        $d += $cpf{$c} * (($t + 1) - $c);
                    }
                    $d = ((10 * $d) % 11) % 10;
                    if ($cpf{$c} != $d) {
                        return false;
                    }
                }
        
                return true;
            }
        
    }
}

// Instanciando o objeto.
// Os métodos estáticos permitem usar a classe sem instanciá-la.
// Comentaremos o código abaixo:

/*$cpf = new Document();
$cpf->setNumber("28971865261"); //CPF gerado em https://www.geradordecpf.org/
var_dump($cpf->getNumber());
*/

//Usando sem instanciar.

var_dump(Document::verifyCpf("28971865261"));


      

?>