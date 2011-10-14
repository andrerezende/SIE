<?php
class UnidadeFederativa {
	protected $id;
	protected $nome;
        protected $pais_id;

	public function UnidadeFederativa($pid = null, $pnome = null, $ppaisid = null) {
		$this->id = $pid;
		$this->nome = $pnome;
	}

	public function getIdUnidadeFederativa() {
		return $this->id;
	}

	public function setIdUnidadeFederativa($pid) {
		$this->id = $pid;
	}

	public function getNome() {
		return $this->nome;
	}

	public function setNome($pnome) {
		$this->nome = $pnome;
	}
        
        public function getIdPais() {
		return $this->pais_id;
	}

	public function setIdPais($ppaisid) {
		$this->pais_id = $ppaisid;
	}

	public function SelectByAll($sock) {
		$ssql = "SELECT id, descricao FROM unidade_federativa A " ;
		$ssql .= " ORDER BY descricao ASC";
		$rs = mysql_query($ssql, $sock);

		$ar = array();

		while ($linha = mysql_fetch_row($rs)){
			$obj = new UnidadeFederativa($linha[0], $linha[1]);
			$ar[] = $obj;
		}
		return ($ar);
	}
        
        public function SelectNomeUnidadeFederativa($sock, $pidUf) {
		$ssql = "SELECT id, descricao FROM unidade_federativa A " ;
		$ssql .= " WHERE id = $pidUf";
		$rs = mysql_query($ssql, $sock);

		$ar = array();

		while ($linha = mysql_fetch_row($rs)){
			$obj = new UnidadeFederativa($linha[0], $linha[1]);
			$ar[] = $obj;
		}
		return ($ar);
	}

}