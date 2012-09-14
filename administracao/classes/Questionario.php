<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Questionario
 *
 * @author antoniony
 */
class Questionario {

    //put your code here

    protected $pergunta;
    protected $resposta;

    public function getPergunta() {
        return $this->pergunta;
    }

    public function setPergunta($pergunta) {
        $this->pergunta = $pergunta;
    }

    public function getResposta() {
        return $this->resposta;
    }

    public function setResposta($resposta) {
        $this->resposta = $resposta;
    }

    public function gerarPerguntas($sock) {

        $ssql = "Select * FROM pergunta ";


        $result = mysql_query($ssql);

 $i = 0;
        while ($this->pergunta = mysql_fetch_object($result)) {
            $i++;
            echo '<h3  id="pergunta'.$i.'">' . $this->pergunta->id . '.' . $this->pergunta->descricao . '</h3>';
            $ssql2 = "Select * from resposta where pergunta_id = " . $this->pergunta->id;
            $result2 = mysql_query($ssql2);
            while (($this->resposta = mysql_fetch_object($result2))) {
                
                echo '&nbsp;&nbsp;&nbsp;<input type="radio" name="resposta' . $this->pergunta->id . '" class="cinput'.$i.'" id="check' . $this->pergunta->id . '" value=' . $this->resposta->id . ' onclick="isChecked();">' . $this->resposta->descricao . '<br>';
                
            }
        }
    }

    public function perguntaRespondida() {
        
    }

    public function gravarResposta($answer, $inscrito_id) {
        $i=0;
        if (isset($answer)) {
            foreach ($answer as $key=>$valor) {
//                var_dump($valor);exit;

    
                $resultado = mysql_query("INSERT INTO inscritoresposta(inscrito_id,resposta_id) values($inscrito_id,$valor)") or die(mysql_error());
            }
            $resultado2 = mysql_query("INSERT INTO socioeco(inscrito_id,respondido) value($inscrito_id,1 )") or die(mysql_error());
            session_destroy("QUESTIONARIO");
            echo "<h2> Resposta Salva com sucesso</h2>";
        }
    }
    public function getId($cpf){
        $result = mysql_query("SELECT id FROM inscrito WHERE cpf = $cpf");
        foreach (mysql_fetch_array($result) as $inscrito){
            return $inscrito;
        }
        
    }
    public function verificaQuestionario($cpf){
        $result = mysql_query("SELECT respondido
FROM ifbaiano40.socioeco 
WHERE inscrito_id = (SELECT id FROM ifbaiano40.inscrito where cpf = $cpf)");
         $num_rows = mysql_num_rows($result);
         while ($inscrito = mysql_fetch_object($result)  ){
            
           if(isset($inscrito)&& $inscrito==1||  $num_rows == 1){
               return true;
           }else
               return false;
             
        }
    }

}

?>