<?php
class Inscrito {
	protected $id;
	protected $nome;
	protected $endereco;
	protected $bairro;
	protected $cep;
	protected $cidade;
	protected $estado;
	protected $email;
	protected $cpf;
	protected $rg;
	protected $especial;
	protected $senha;
	protected $nacionalidade;
	protected $telefone;
	protected $telefone2;
	protected $celular;
	protected $datanascimento;
	protected $sexo;
	protected $estadocivil;
	protected $orgaoexpedidor;
	protected $uf;
	protected $dataexpedicao;
	protected $especial_descricao;
	protected $responsavel;
	protected $isencao;
	protected $declaracao;
	protected $localprova;
	protected $numinscricao;
	protected $especial_prova;
	protected $especial_prova_descricao;
	protected $vaga_especial;
	protected $vaga_rede_publica;
	protected $vaga_rural;
        protected $vaga_etnia;
        protected $vaga_renda;
	protected $campus;
	protected $curso;
	protected $nis;
	protected $nota;
        protected $data_cadastro;
	protected $ultima_alteracao;

        //atributos especificos para o processo seletivo de EAD
        protected $mediapor1;
	protected $mediapor2;
	protected $mediapor3;
	protected $mediamat1;
	protected $mediamat2;
	protected $mediamat3;

        public function _construct(){}
        

	public function getid() {
		return $this->id;
	}
        
        public function setid($pid) {
		$this->id = $pid;
	}

	public function getnome() {
		return $this->nome;
	}

	public function setnome($pnome) {
		$this->nome = $pnome;
	}

	public function getendereco(){
		return $this->endereco;
	}

	public function setendereco($pendereco){
		$this->endereco = $pendereco;
	}

	public function getbairro(){
		return $this->bairro;
	}

	public function setbairro($pbairro){
		$this->bairro = $pbairro;
	}

	public function getcep(){
		return $this->cep;
	}

	public function setcep($pcep) {
		$this->cep = $pcep;
	}

	public function getcidade(){
		return $this->cidade;
	}

	public function setcidade($pcidade){
		$this->cidade = $pcidade;
	}

	public function getestado(){
		return $this->estado;
	}

	public function setestado($pestado) {
		$this->estado = $pestado;
	}

	public function getemail() {
		return $this->email;
	}

	public function setemail($pemail) {
		$this->email = $pemail;
	}

	public function getcpf() {
		return $this->cpf;
	}

	public function setcpf($pcpf) {
		$this->cpf = $pcpf;
	}

	public function getrg() {
		return $this->rg;
	}

	public function setrg($prg) {
		$this->rg = $prg;
	}

	public function getespecial() {
		return $this->especial;
	}

	public function setespecial($pespecial) {
		$this->especial = $pespecial;
	}

	public function getsenha() {
		return $this->senha;
	}

	public function setsenha($psenha) {
		$this->senha = $psenha;
	}

	public function getnacionalidade() {
		return $this->nacionalidade;
	}

	public function setnacionalidade($pnacionalidade) {
		$this->nacionalidade = $pnacionalidade;
	}

	public function gettelefone() {
		return $this->telefone;
	}

	public function settelefone($ptelefone) {
		$this->telefone = $ptelefone;
	}

	public function gettelefone2() {
		return $this->telefone2;
	}

	public function settelefone2($ptelefone2) {
		$this->telefone2 = $ptelefone2;
	}

	public function getcelular() {
		return $this->celular;
	}

	public function setcelular($pcelular) {
		$this->celular = $pcelular;
	}

	public function getdatanascimento() {
		return $this->datanascimento;
	}

	public function setdatanascimento($pdatanascimento) {
		$this->datanascimento = $pdatanascimento;
	}

	public function getsexo() {
		return $this->sexo;
	}

	public function setsexo($psexo) {
		$this->sexo = $psexo;
	}

	public function getestadocivil() {
		return $this->estadocivil;
	}

	public function setestadocivil($pestadocivil) {
		$this->estadocivil = $pestadocivil;
	}

	public function getorgaoexpedidor() {
		return $this->orgaoexpedidor;
	}

	public function setorgaoexpedidor($porgaoexpedidor) {
		$this->orgaoexpedidor = $porgaoexpedidor;
	}

	public function getuf() {
		return $this->uf;
	}

	public function setuf($puf) {
		$this->uf = $puf;
	}

	public function getdataexpedicao() {
		return $this->dataexpedicao;
	}

	public function setdataexpedicao($pdataexpedicao) {
		$this->dataexpedicao = $pdataexpedicao;
	}

	public function getespecialdescricao() {
		return $this->especial_descricao;
	}

	public function setespecialdescricao($pespecial_descricao) {
		$this->especial_descricao = $pespecial_descricao;
	}

	public function getresponsavel() {
		return $this->responsavel;
	}

	public function setresponsavel($presponsavel) {
		$this->responsavel = $presponsavel;
	}

	public function getisencao() {
		return $this->isencao;
	}

	public function setisencao($pisencao) {
		$this->isencao = $pisencao;
	}

	public function getdeclaracao() {
		return $this->declaracao;
	}

	public function setdeclaracao($pdeclaracao) {
		$this->declaracao = $pdeclaracao;
	}

	public function getlocalprova() {
		return $this->localprova;
	}

	public function setlocalprova($plocalprova) {
		$this->localprova = $plocalprova;
	}

	public function getnuminscricao() {
		return $this->numinscricao;
	}

	public function setnuminscricao($pnuminscricao) {
		$this->numinscricao = $pnuminscricao;
	}

	public function getespecialprova() {
		return $this->especial_prova;
	}

	public function setespecialprova($pespecial_prova) {
		$this->especial_prova = $pespecial_prova;
	}

	public function getespecialprovadescricao() {
		return $this->especial_prova_descricao;
	}

	public function setespecialprovadescricao($pespecial_prova_descricao) {
		$this->especial_prova_descricao = $pespecial_prova_descricao;
	}

	public function getvagaespecial() {
		return $this->vaga_especial;
	}

	public function setvagaespecial($pvaga_especial) {
		$this->vaga_especial = $pvaga_especial;
	}

	public function getvagaredepublica() {
		return $this->vaga_rede_publica;
	}

	public function setvagaredepublica($pvaga_rede_publica) {
		$this->vaga_rede_publica = $pvaga_rede_publica;
	}

	public function getvagarural() {
		return $this->vaga_rural;
	}

	public function setvagarural($pvaga_rural) {
		$this->vaga_rural = $pvaga_rural;
	}
        
        public function getvagaetnia() {
		return $this->vaga_etnia;
	}

	public function setvagaetnia($pvaga_etnia) {
		$this->vaga_etnia = $pvaga_etnia;
	}
        
        public function getvagarenda() {
		return $this->vaga_renda;
	}

	public function setvagarenda($pvaga_renda) {
		$this->vaga_renda = $pvaga_renda;
	}

	public function getcampus() {
		return $this->campus;
	}

	public function setcampus($pcampus) {
		$this->campus = $pcampus;
	}

	public function getdatacadastro() {
		return $this->data_cadastro;
	}

	public function setdatacadastro($pdata_cadastro) {
		$this->data_cadastro = $pdata_cadastro;
	}

	public function getultimaalteracao() {
		return $this->ultima_alteracao;
	}

	public function setultimaalteracao($pultima_alteracao) {
		$this->ultima_alteracao = $pultima_alteracao;
	}

	public function getcurso() {
		return $this->curso;
	}

	public function setcurso($pcurso) {
		$this->curso = $pcurso;
	}

	public function getnis() {
		return $this->nis;
	}

	public function setnis($pnis) {
		$this->nis = $pnis;
	}

	public function getnota() {
		return $this->nota;
	}

	public function setnota($pnota) {
		$this->nota = $pnota;
	}

        //atributos especificos para o processo seletivo de EAD

        public function getmediapor1(){
                return $this->mediapor1;
        }

        public function setmediapor1($pmediapor1){
                $this->mediapor1 = $pmediapor1;        
        }
        
	public function getmediapor2(){
                return $this->mediapor2;                        
        }

        public function setmediapor2($pmediapor2){
                $this->mediapor2 = $pmediapor2;                
        }
        
	public function getmediapor3(){
                return $this->mediapor3;                        
        }
        
        public function setmediapor3($pmediapor3){
                $this->mediapor3 = $pmediapor3;                         
        }
        
	public function getmediamat1(){
                return $this->mediamat1;
        }
        
        public function setmediamat1($pmediamat1){
                $this->mediamat1 = $pmediamat1;                        
        }
	
        public function getmediamat2(){
                return $this->mediamat2;  
        }
        
        public function setmediamat2($pmediamat2){
                $this->mediamat2 = $pmediamat2;                                                
        }
	
        public function getmediamat3(){
                return $this->mediamat3;
        }
        
        public function setmediamat3($pmediamat3){
                $this->mediamat3 = $pmediamat3;                                                
        }     
        
        public function Inserir($sock) {
		$this->data_cadastro = date('Y-m-d H:i:s');
		$this->ultima_alteracao = $this->data_cadastro;

		$ssql = "INSERT INTO inscrito (nome, endereco, bairro, cep, cidade, estado, email, cpf, rg, especial, senha, nacionalidade, telefone, telefone2, celular, datanascimento, sexo, estadocivil, orgaoexpedidor, uf, dataexpedicao, especial_descricao, responsavel, isencao, declaracao, localprova, numinscricao, especial_prova, especial_prova_descricao, vaga_especial, vaga_rede_publica, vaga_rural, campus, data_cadastro, ultima_alteracao, curso, nis, mediapor1, mediapor2, mediapor3, mediamat1, mediamat2, mediamat3) VALUES ";
                
		$ssql .= "('" . $this->nome . "','" . $this->endereco . "',";
		$ssql .= "'" . $this->bairro . "','" . $this->cep . "',";
		$ssql .= "'" . $this->cidade . "','" . $this->estado . "',";
		$ssql .= "'" . $this->email . "','" . $this->cpf . "',";
		$ssql .= "'" . $this->rg ."','" . $this->especial . "','" . $this->senha . "',";
		$ssql .= "'" . $this->nacionalidade . "','" . $this->telefone . "','" . $this->telefone2 . "',";
		$ssql .= "'" . $this->celular . "','" . $this->datanascimento . "','" . $this->sexo . "',";
		$ssql .= "'" . $this->estadocivil . "','" . $this->orgaoexpedidor ."','" . $this->uf . "',";
		$ssql .= "'" . $this->dataexpedicao . "','".$this->especial_descricao."','".$this->responsavel."',";
		$ssql .= "'" . $this->isencao . "',";
		$ssql .= "'" . $this->declaracao . "','" . $this->localprova . "',";
		$ssql .= "'" . $this->numinscricao . "',";
		$ssql .= "'" . $this->especial_prova . "','" . $this->especial_prova_descricao . "',";
		$ssql .= "'" . $this->vaga_especial . "','" . $this->vaga_rede_publica . "',";
		$ssql .= "'" . $this->vaga_rural . "',";
                $ssql .= "'" . $this->vaga_etnia . "',";
                $ssql .= "'" . $this->vaga_renda . "',";
		$ssql .= "'" . $this->campus . "',";
		$ssql .= "'" . $this->data_cadastro . "','" . $this->ultima_alteracao . "','" . $this->curso . "','" . $this->nis . "',";
           	$ssql .= "'" . $this->mediapor1 . "','" . $this->mediapor2 . "','" . $this->mediapor3 . "',";
                $ssql .= "'" . $this->mediamat1 . "','" . $this->mediamat2 . "','" . $this->mediamat3 . "'" . ")";               
                
                $rs = mysql_query($ssql, $sock);

		$linha = mysql_affected_rows();

		if ($linha > 0) {
			return mysql_insert_id();
		} else {
			return 0;
		}
	}

	public function atualizar($sock) {
		$this->ultima_alteracao = date('Y-m-d H:i:s');
                
		$ssql = "UPDATE inscrito SET";

		$ssql .= " nome = '" . $this->nome . "', endereco = '" . $this->endereco . "',";
		$ssql .= "bairro = '" . $this->bairro . "', cep = '" . $this->cep . "',";
		$ssql .= "cidade = '" . $this->cidade . "', estado = '" . $this->estado . "',";
		$ssql .= "email = '" . $this->email . "', cpf = '" . $this->cpf . "',";
		$ssql .= "rg = '" . $this->rg . "', especial = '" . $this->especial . "', senha = '" . $this->senha . "',";
		$ssql .= "nacionalidade = '" . $this->nacionalidade . "', telefone = '" . $this->telefone . "', telefone2 = '" . $this->telefone2 . "',";
		$ssql .= "celular = '" . $this->celular . "', datanascimento = '" . $this->datanascimento . "', sexo = '" . $this->sexo . "',";
		$ssql .= "estadocivil = '" . $this->estadocivil . "', orgaoexpedidor = '" . $this->orgaoexpedidor . "', uf = '" . $this->uf . "',";
		$ssql .= "dataexpedicao = '" . $this->dataexpedicao . "', especial_descricao = '" . $this->especial_descricao . "', responsavel = '" . $this->responsavel . "',";
		$ssql .= "isencao = '" . $this->isencao . "',";
		$ssql .= "localprova = '" . $this->localprova . "', numinscricao = '" . $this->numinscricao . "',";
		$ssql .= "especial_prova = '" . $this->especial_prova . "', especial_prova_descricao = '" . $this->especial_prova_descricao . "',";
		$ssql .= "vaga_especial = '" . $this->vaga_especial . "', vaga_rede_publica = '" . $this->vaga_rede_publica . "',";
		$ssql .= "vaga_rural = '" . $this->vaga_rural . "',";
                $ssql .= "vaga_etnia = '" . $this->vaga_etnia . "',";
                $ssql .= "vaga_renda = '" . $this->vaga_renda . "',";
		$ssql .= "ultima_alteracao = '" . $this->ultima_alteracao . "',";
		$ssql .= "campus = '" . $this->campus . "',";
		$ssql .= "curso = '" . $this->curso . "',";
		$ssql .= "nota = '" . $this->nota . "',";
		$ssql .= "nis = '" . $this->nis . "',";
                $ssql .= "mediapor1 = '" . $this->mediapor1 . "',";
                $ssql .= "mediapor2 = '" . $this->mediapor2 . "',";
                $ssql .= "mediapor3 = '" . $this->mediapor3 . "',";
                $ssql .= "mediamat1 = '" . $this->mediamat1 . "',";
                $ssql .= "mediamat2 = '" . $this->mediamat2 . "',";                              
               	$ssql .= "mediamat3 = '" . $this->mediamat3 . "'";

		$ssql .= " WHERE id = " . $this->id;

                $rs = mysql_query($ssql, $sock) or die(mysql_error());

		$linha = mysql_affected_rows();

		if ($linha > 0 || true === $rs) {
			return true;
		} else {
			return false;
		}
	}

	public function apagar($sock,$id) {
		$ssql = "delete from inscrito";
		$ssql = $ssql. " WHERE id = ".$id;

		$rs = mysql_query($ssql, $sock);

		$linha = mysql_affected_rows();

		if ($linha >0) {
			return true;
		} else {
			return false;
		}
	}

	public function SelectByAll($sock) {
		$ssql = "SELECT nome, endereco, bairro, cep, cidade, estado, email, cpf, rg, especial, senha, nacionalidade, telefone, telefone2, celular, datanascimento, sexo, estadocivil, orgaoexpedidor, uf, dataexpedicao, especial_descricao, responsavel, isencao, declaracao, localprova, numinscricao, especial_prova, especial_prova_descricao, vaga_especial, vaga_rede_publica, vaga_rural, vaga_etnia, vaga_renda, campus, id, curso, nis, nota, mediapor1, mediapor2, mediapor3, mediamat1, mediamat2, mediamat3 FROM inscrito A " ;
		$ssql = $ssql . " ORDER BY trim(nome)"; 
                
		$rs = mysql_query($ssql, $sock);
                
                $ar = array();
                                              
                while ($linha = mysql_fetch_row($rs)){
			$obj = mysql_fetch_object($rs, "Inscrito");
			$ar[] = $obj;
		}
                return $ar;
                
	}
        
        public function SelectByPrimaryKey($sock,$codigo,$senha) {
		$ssql = "SELECT nome, endereco, bairro, cep, cidade, estado, email, cpf, rg, especial, senha, nacionalidade, telefone, telefone2, celular, datanascimento, sexo, estadocivil, orgaoexpedidor, uf, dataexpedicao, especial_descricao, responsavel, isencao, declaracao, localprova, numinscricao, especial_prova, especial_prova_descricao, vaga_especial, vaga_rede_publica, vaga_rural, vaga_etnia, vaga_renda, campus, id, curso, nis, nota, mediapor1, mediapor2, mediapor3, mediamat1, mediamat2, mediamat3 FROM inscrito A " ;
		$ssql = $ssql . " WHERE cpf=" .$codigo." AND senha = '" .$senha."'";

		$rs = mysql_query($ssql, $sock);
                
                $ar = array();
                
                $obj = mysql_fetch_object($rs, "Inscrito");

                $ar[] = $obj;

                return $ar;
	}

	public function SelectByRg($sock,$codigo) {
		$ssql = "SELECT nome, endereco, bairro, cep, cidade, estado, email, cpf, rg, especial, senha, nacionalidade, telefone, telefone2, celular, datanascimento, sexo, estadocivil, orgaoexpedidor, uf, dataexpedicao, especial_descricao, responsavel, isencao, declaracao, localprova, numinscricao, especial_prova, especial_prova_descricao, vaga_especial, vaga_rede_publica, vaga_rural, vaga_etnia, vaga_renda, campus, id, curso, nis, nota, mediapor1, mediapor2, mediapor3, mediamat1, mediamat2, mediamat3 FROM inscrito A " ;
		$ssql = $ssql . " WHERE rg=" .$codigo;

		$rs = mysql_query($ssql, $sock);

		$ar = array();

		while ($linha = mysql_fetch_row($rs)) {
			$obj = new Inscrito($linha[0],$linha[1],$linha[2],$linha[3],$linha[4],$linha[5],$linha[6],$linha[7],$linha[8],$linha[9],$linha[10],$linha[11],$linha[12],$linha[13],$linha[14],$linha[15],$linha[16],$linha[17],$linha[18],$linha[19],$linha[20],$linha[21],$linha[22],$linha[23],$linha[24],$linha[25],$linha[26],$linha[27],$linha[28],$linha[29],$linha[30],$linha[31],$linha[32],$linha[33],null,null,$linha[34],$linha[35],$linha[36]);
			$ar[] = $obj;
		}
		return $ar;
	}

	public function SelectByCpf($sock,$codigo) {
		$ssql = "SELECT nome, endereco, bairro, cep, cidade, estado, email, cpf, rg, especial, senha, nacionalidade, telefone, telefone2, celular, datanascimento, sexo, estadocivil, orgaoexpedidor, uf, dataexpedicao, especial_descricao, responsavel, isencao, declaracao, localprova, numinscricao, especial_prova, especial_prova_descricao, vaga_especial, vaga_rede_publica, vaga_rural, vaga_etnia, vaga_renda, campus, id, curso, nis, nota, mediapor1, mediapor2, mediapor3, mediamat1, mediamat2, mediamat3 FROM inscrito A " ;
                $ssql = $ssql . " WHERE cpf=" .$codigo;
                              
		$rs = mysql_query($ssql, $sock);
                
                $obj = mysql_fetch_object($rs, "Inscrito");

                $ar[] = $obj;

                return $ar;
	}

	public function SelectById($sock,$id) {
                $ssql = "SELECT nome, endereco, bairro, cep, cidade, estado, email, cpf, rg, especial, senha, nacionalidade, telefone, telefone2, celular, datanascimento, sexo, estadocivil, orgaoexpedidor, uf, dataexpedicao, especial_descricao, responsavel, isencao, declaracao, localprova, numinscricao, especial_prova, especial_prova_descricao, vaga_especial, vaga_rede_publica, vaga_rural, vaga_etnia, vaga_renda, campus, id, curso, nis, nota, mediapor1, mediapor2, mediapor3, mediamat1, mediamat2, mediamat3 FROM inscrito A " ;
                $ssql .= " WHERE id='" .$id ."'";
               
		$rs = mysql_query($ssql, $sock);
                
                $obj = mysql_fetch_object($rs, "Inscrito");

                $ar[] = $obj;

                return $ar;
	}

	public function Existe($sock) {
		$ssql = "SELECT nome, endereco, bairro, cep, cidade, estado, email, cpf, rg, especial, senha, nacionalidade, telefone, telefone2, celular, datanascimento, sexo, estadocivil, orgaoexpedidor, uf, dataexpedicao, especial_descricao, responsavel, isencao, declaracao, localprova, numinscricao, especial_prova, especial_prova_descricao, vaga_especial, vaga_rede_publica, vaga_rural, vaga_etnia, vaga_renda, campus, id, curso, nis, nota, mediapor1, mediapor2, mediapor3, mediamat1, mediamat2, mediamat3 FROM inscrito A " ;
		$ssql = $ssql . " WHERE cpf=" .$this->cpf;

		$rs = mysql_query($ssql, $sock);

		$ar = array();
		$i = 0;

		while ($linha = mysql_fetch_row($rs)) {
			//$obj = new Inscrito($linha[0],$linha[1],$linha[2],$linha[3],$linha[4],$linha[5],$linha[6],$linha[7],$linha[8],$linha[9],$linha[10],$linha[11],$linha[12],$linha[13],$linha[14],$linha[15],$linha[16],$linha[17],$linha[18],$linha[19],$linha[20],$linha[21],$linha[22],$linha[23],$linha[24],$linha[25],$linha[26],$linha[27],$linha[28],$linha[29],$linha[30],$linha[31],$linha[32],$linha[33],null,null,$linha[34],$linha[35],$linha[36]);
                        $obj = new Inscrito($linha[0],$linha[1],$linha[2],$linha[3],$linha[4],$linha[5],$linha[6],$linha[7],$linha[8],$linha[9],$linha[10],$linha[11],$linha[12],$linha[13],$linha[14],$linha[15],$linha[16],$linha[17],$linha[18],$linha[19],$linha[20],$linha[21],$linha[22],$linha[23],$linha[24],$linha[25],$linha[26],$linha[27],$linha[28],$linha[29],$linha[30],$linha[31],$linha[32],$linha[33],$linha[34],$linha[35],$linha[36],$linha[37],$linha[38]);
			$ar[$i] = $obj;
			$i++;
		}
		if (count($ar)>0) {
			return true;
		} else {
			return false;
		}
	}

	public function SelectByLocalidade($sock,$codigoLocalidade) {
		$ssql = "SELECT nome, endereco, bairro, cep, cidade, estado, email, telefone, celular, cpf, rg, localprova, especial,senha,id FROM inscrito A " ;
		$ssql = $ssql . " WHERE A.localprova = ".$codigoLocalidade;
		$ssql = $ssql . " ORDER BY trim(nome)";

		$rs = mysql_query($ssql, $sock);

		$ar= array();

		while ($linha = mysql_fetch_row($rs)){
			$obj = new Inscrito($linha[0],$linha[1],$linha[2],$linha[3],$linha[4],$linha[5],$linha[6],$linha[7],$linha[8],$linha[9],$linha[10],$linha[11],$linha[12],$linha[13],$linha[14]);
			$ar[] = $obj;
		}
		return ($ar);
	}

	public function SelectByCurso($sock,$codigoCurso){
		$ssql = "SELECT nome, endereco, bairro, cep, cidade, estado, email, telefone, celular, cpf, rg, localprova, especial,senha,id FROM inscrito A " ;
		$ssql = $ssql . " JOIN inscrito_curso IC ON IC.id_inscrito = A.ID ";
		$ssql = $ssql . " WHERE IC.cod_curso =".$codigoCurso;
		$ssql = $ssql . " ORDER BY trim(nome)";

		$rs = mysql_query($ssql, $sock);
		$ar = array();

		while ($linha = mysql_fetch_row($rs)){
			$obj = new Inscrito($linha[0],$linha[1],$linha[2],$linha[3],$linha[4],$linha[5],$linha[6],$linha[7],$linha[8],$linha[9],$linha[10],$linha[11],$linha[12],$linha[13],$linha[14]);
			$ar[] = $obj;
		}
		return ($ar);
	}

	public function SelectByNecessidade($sock,$necessidade){
		$ssql = "SELECT nome, endereco, bairro, cep, cidade, estado, email, telefone, celular, cpf, rg, localprova, especial, senha, id FROM inscrito A " ;
		$ssql = $ssql . " WHERE especial = '".$necessidade."'";
		$ssql = $ssql . " ORDER BY trim(nome)";

		$rs = mysql_query($ssql, $sock);

		$ar = array();

		while ($linha = mysql_fetch_row($rs)){
			$obj = new Inscrito($linha[0],$linha[1],$linha[2],$linha[3],$linha[4],$linha[5],$linha[6],$linha[7],$linha[8],$linha[9],$linha[10],$linha[11],$linha[12],$linha[13],$linha[14]);
			$ar[] = $obj;
		}
		return ($ar);
	}

	public function SelectByComNecessidade($sock,$opcao) {
		$ssql = "SELECT nome, endereco, bairro, cep, cidade, estado, email, telefone, celular, cpf, rg, localprova, especial, senha, id FROM inscrito A " ;

		if ($opcao) {
			$ssql .= " WHERE especial <> 'NÃO'";
		} else {
			$ssql .= " WHERE especial = 'NÃO'";
		}
		$ssql .= " ORDER BY trim(nome)";

		$rs = mysql_query($ssql, $sock);

		$ar = array();

		while ($linha = mysql_fetch_row($rs)){
			$obj = new Inscrito($linha[0],$linha[1],$linha[2],$linha[3],$linha[4],$linha[5],$linha[6],$linha[7],$linha[8],$linha[9],$linha[10],$linha[11],$linha[12],$linha[13],$linha[14]);
			$ar[] = $obj;
		}
		return ($ar);
	}

	public function SelectCurso($sock, $curso_id) {
		$ssql = "SELECT cod_curso, nome, campus FROM curso WHERE cod_curso = $curso_id LIMIT 1";

		$rs = mysql_query($ssql, $sock);

		while ($linha = mysql_fetch_row($rs)) {
			$curso = new Curso($linha[0], $linha[1], $linha[2]);
		}
		return $curso;
	}

	public function homologarIsento($sock, $ids) {
		$ssql = "UPDATE inscrito SET isento_homologado = 1 WHERE id IN ($ids) AND isencao = 'SIM'";

		return mysql_query($ssql, $sock);
	}
}