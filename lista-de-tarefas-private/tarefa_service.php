<?php 

// CRUD, aqui se encontra as funções desejadas para a aplicação
 class TarefaService {

   private $conexao;
   private $tarefa;

   public function __construct(Conexao $conexao, Tarefa $tarefa) {
      $this->conexao = $conexao->connect();
      $this->tarefa = $tarefa;
   }

    // Create
    public function insert(){
      $query = 'insert into tb_tarefas(tarefa)values(:tarefa)';
      $stmt = $this->conexao->prepare($query);
      $stmt->bindValue(':tarefa', $this->tarefa->__get('tarefa'));
      $stmt->execute();
    }

    //Read
    public function recover(){
      $query = '
      select 
        t.id, s.status, t.tarefa, t.data_cadastrado 
      from 
        tb_tarefas as t
        left join tb_status as s on (t.id_status = s.id)';
      $stmt = $this->conexao->prepare($query);
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    //Update
     public function update(){
        $query = 'update tb_tarefas set tarefa = ? where id= ?';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(1, $this->tarefa->__get('tarefa'));
        $stmt->bindValue(2, $this->tarefa->__get('id'));
        return $stmt->execute();
    }
    
    //delete
     public function remove(){
        
    }



 }


?>