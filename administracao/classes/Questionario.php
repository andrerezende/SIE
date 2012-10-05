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

        $ssql = "Select * FROM pergunta WHERE anoquestionario_id = (SELECT id FROM anoquestionario WHERE ano = " . date('Y') . ")";



        $result = mysql_query($ssql);

        $i = 0;
        
        while ($this->pergunta = mysql_fetch_object($result)) {
            $i++;
            echo '<tr><td><h3  id="pergunta' . $i . '">' . $this->pergunta->id . '.' . $this->pergunta->descricao . '</h3></td>';
            $ssql2 = "Select * from resposta where pergunta_id = " . $this->pergunta->id;
            $result2 = mysql_query($ssql2);
            while (($this->resposta = mysql_fetch_object($result2))) {

                echo '<tr></tr><td><input type="radio" name="resposta' . $this->pergunta->id . '" class="cinput' . $i . '" id="check' . $this->pergunta->id . '" value=' . $this->resposta->id . ' onclick="isChecked();">' . $this->resposta->descricao.'</td>' ;
                 
            }
          echo " </tr>";
        }
    }
//Método para realizar UPDATE das resposta gravadas
    public function gravarEditarResposta($resposta, $inscrito_id) {
        $result = mysql_query("SELECT * FROM inscritoresposta WHERE inscrito_id = $inscrito_id");
        $i = 0;
        $count = 1;
        foreach ($resposta as $valor) {
            $i++;
            $vetor[$i] = $valor;
        }

        while ($valor = mysql_fetch_object($result) ) {
            
            $query = "UPDATE inscritoresposta SET resposta_id=$vetor[$count] WHERE id=$valor->id and inscrito_id = $inscrito_id";

            mysql_query($query) or die(mysql_error());
            $count++;
        }
     
        
        
    }

    public function gravarResposta($answer, $inscrito_id) {
        $i = 0;
        $flag = false;
        $query = "SELECT * FROM socioeco WHERE inscrito_id = $inscrito_id";
        if (mysql_num_rows(mysql_query($query)) == 1) {
            $flag = true;
        }
        if (!$flag) {
            if (isset($answer)) {
                foreach ($answer as $key => $valor) {

                 $sql = "INSERT INTO inscritoresposta(inscrito_id,resposta_id) values($inscrito_id,$valor)";
                 
                    $resultado = mysql_query($sql) or die(mysql_error());
                }
                $resultado2 = mysql_query("INSERT INTO socioeco(inscrito_id,respondido) value($inscrito_id,1 )") or die(mysql_error());
                

                echo "<h2> Question&aacute;rio respondido com sucesso</h2>";
            }
        }
    }

    public function editarResposta($inscrito_id) {
        $ssql = "Select * FROM pergunta WHERE anoquestionario_id = (SELECT id FROM anoquestionario WHERE ano = " . date('Y') . ")";

        $vetorResposta = array();

        $result = mysql_query($ssql);

        $i = 0;
        $j = 0;
        $result3 = mysql_query("select * from inscritoresposta where inscrito_id =" . $inscrito_id);
        while ($resposta = mysql_fetch_object($result3)) {
            $vetorResposta[$j] = $resposta->resposta_id;
            $j++;
        }

        while ($this->pergunta = mysql_fetch_object($result)) {
            $i++;
            echo '<tr><td><h3  id="pergunta' . $i . '">' . $this->pergunta->id . '.' . $this->pergunta->descricao . '</h3><td>';
            $ssql2 = "Select * from resposta where pergunta_id = " . $this->pergunta->id;
            $result2 = mysql_query($ssql2);
            while (($this->resposta = mysql_fetch_object($result2))) {

                for ($count = 0; $count < $j; $count++) {

                    if ($vetorResposta[$count] == $this->resposta->id) {
                        $checked = "CHECKED";
                        break;
                    } else {
                        $checked = null;
                    }
//                  echo '&nbsp;&nbsp;&nbsp;<input type="radio" name="resposta' . $this->pergunta->id . '" class="cinput' . $i . '" id="check' . $this->pergunta->id . '" value=' . $this->resposta->id . ' onclick="isChecked();" '.$checked.'>' . $this->resposta->descricao . '<br>';
                }

                echo '<tr></tr><td><input type="radio" name="resposta' . $this->pergunta->id . '" class="cinput' . $i . '" id="check' . $this->pergunta->id . '" value=' . $this->resposta->id . ' onclick="isChecked();" ' . $checked . '>' . $this->resposta->descricao . '</td>';
//       
            }
                echo " </tr>";
        }
    }

    public function getId($cpf) {
        $result = mysql_query("SELECT id FROM inscrito WHERE cpf = $cpf");
        foreach (mysql_fetch_object($result) as $inscrito) {
            
            return (int)$inscrito;
        }
    }
public function verificaRespostaQuestionario($sock, $cpf) {
        $ssql = "SELECT id, inscrito_id, respondido FROM socioeco WHERE inscrito_id = (SELECT id FROM inscrito where cpf = $cpf)" ;
        $rs = mysql_query($ssql, $sock);
        $linha = mysql_affected_rows();
        if ($linha >0) {
            return true;
        } else {
            return false;
        }
    }
    public function verificaQuestionario($cpf) {
        $result = mysql_query("SELECT respondido
FROM socioeco 
WHERE inscrito_id = (SELECT id FROM inscrito where cpf = $cpf)");
        $num_rows = mysql_num_rows($result);
        while ($inscrito = mysql_fetch_object($result)) {

            if (isset($inscrito) && $inscrito == 1 || $num_rows == 1) {
                return true;
            }else
                return false;
        }
    }

    public function verificaQuestionario2($id) {
        $result = mysql_query("SELECT respondido
FROM socioeco 
WHERE inscrito_id = (SELECT id FROM inscrito where id = $id)");
        $num_rows = mysql_num_rows($result);
        while ($inscrito = mysql_fetch_object($result)) {
           
            if (isset($inscrito) || $num_rows == 1) {
                return true;
            }else
                return false;
        }
    }

    public function gravarCookie($id) {
        setcookie("usuario", $id);
    }

//    public function getIdCookie() {
//        var_dump($_COOKIE['usuario']);
//        exit;
//        return $_COOKIE["usuario"];
//    }

}

?>