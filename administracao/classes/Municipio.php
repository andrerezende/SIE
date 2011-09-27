<?php


class Municipio {
	protected $id;
	protected $nome;
        protected $unidade_federativa_id;

	public function Municipio($pid = null, $pnome = null, $punidade_federativa_id = null) {
		$this->id = $pid;
		$this->nome = $pnome;
                $this->unidade_federativa_id = $unidade_federativa_id;
                
	}

	public function getIdMunicipio() {
		return $this->id;
	}

	public function setIdMunicipio($pid) {
		$this->id = $pid;
	}

	public function getNome() {
		return $this->nome;
	}

	public function setNome($pnome) {
		$this->nome = $pnome;
	}
        
        public function getUnidadeFederativaId() {
		return $this->unidade_federativa_id;
	}

	public function setUnidadeFederativaId($punidade_federativa_id) {
		$this->unidade_federativa_id = $punidade_federativa_id;
	}

	public function SelectByAll($sock) {
		$ssql = "SELECT id, nome, unidade_federativa_id FROM municipio A " ;
		$ssql .= " ORDER BY nome ASC";
		$rs = mysql_query($ssql, $sock);

		$ar = array();

		while ($linha = mysql_fetch_row($rs)){
			$obj = new Municipio($linha[0], $linha[1], $linha[2]);
			$ar[] = $obj;
		}
		return ($ar);
	}

	public function SelectNomeMunicipio($sock, $pidMunicipio) {
		$ssql = "SELECT id, nome, unidade_federativa_id FROM municipio A " ;
		$ssql .= " WHERE id = $pidMunicipio";
		$rs = mysql_query($ssql, $sock);

		$linha = mysql_fetch_row($rs);
		return new Municipio($linha[0], $linha[1], $linha[2]);
	}

//	public function Inserir($sock) {
//		$ssql = 'INSERT INTO campus (nome) VALUES ';
//		$ssql .= " ('". $this->nome . "')";
//
//		$rs = mysql_query($ssql, $sock);
//
//		return $rs;
//	}
//
//	public function existeCandidatoAssociado($sock, $id) {
//		$ssql = "SELECT * FROM inscrito";
//		$ssql .= " WHERE curso = " . $id;
//
//		$rs = mysql_query($ssql, $sock);
//
//		$linha = mysql_affected_rows();
//
//		if ($linha > 0) {
//			return true;
//		} else {
//			return false;
//		}
//	}
//
//	public function inativar($sock, $id) {
//		$ssql = "UPDATE campus SET";
//		$ssql .= " ativo = 'N'";
//		$ssql .= " WHERE id = ".$id;
//
//		$rs = mysql_query($ssql, $sock);
//
//		$linha = mysql_affected_rows();
//
//		if ($linha > 0) {
//			return true;
//		} else {
//			return false;
//		}
//	}
//
//	public function apagar($sock, $id) {
//		$ssql = "DELETE FROM campus";
//		$ssql .= " WHERE id = ".$id;
//
//		$rs = mysql_query($ssql, $sock);
//
//		$linha = mysql_affected_rows();
//
//		if ($linha > 0) {
//			return true;
//		} else {
//			return false;
//		}
//	}

        
}