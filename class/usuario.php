<?php

class Usuario{
    private $id_aluno;
    private $nome;
    private $email;
    private $matricula;

    //Métodos acessores

    public function getIdaluno(){
        return $this->id_aluno;
    }
    public function getNome(){
        return $this->nome;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getMatricula(){
        return $this->matricula;
    }

    //Métodos modificadores

    public function setIdaluno($value){
        $this->id_aluno = $value;
    }
    public function setNome($value){
        $this->nome = $value;
    }
    public function setEmail($value){
        $this->email = $value;
    }
    public function setMatricula($value){
        $this->matricula = $value;
    }

    public function loadById($id_aluno){
        $sql = new Sql();

        $results = $sql->select(
            "SELECT * FROM aluno WHERE id_aluno = :ID_ALUNO",
            array(":ID_ALUNO"=>$id_aluno)
        );
        if(count($results) > 0){
            $row = $results[0];
            $this->setIdaluno($row['id_aluno']);
            $this->setNome($row['nome']);
            $this->setEmail($row['email']);
            $this->setMatricula($row['matricula']);
        }
    }

    public function __toString(){
        return json_encode(
            array(
                "id_aluno"=>$this->getIdaluno(),
                "nome"=>$this->getNome(),
                "email"=>$this->getEmail(),
                "Matricula"=>$this->getMatricula()
            )
        );
    }


}

?>