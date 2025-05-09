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
      $query = 'select id, id_status, tarefa, data_cadastrado from tb_tarefas';
      $stmt = $this->conexao->prepare($query);
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    //Update
     public function update(){
        
    }
    
    //delete
     public function remove(){
        
    }



 }


?>