<?php

// CRUD, aqui se encontra as funções desejadas para a aplicação
class TarefaService
{

  private $conexao;
  private $tarefa;

  public function __construct(Conexao $conexao, Tarefa $tarefa)
  {
    $this->conexao = $conexao->connect();
    $this->tarefa = $tarefa;
  }

  // Create
  public function insert()
  {
    $query = 'insert into tb_tarefas(tarefa, titulo_tarefa)values(:tarefa, :titulo_tarefa)';
    $stmt = $this->conexao->prepare($query);
    $stmt->bindValue(':tarefa', $this->tarefa->__get('tarefa'));
    $stmt->bindValue(':titulo_tarefa', $this->tarefa->__get('titulo_tarefa'));
    return $stmt->execute();
  }

  //Read
  public function recover()
  {
    $query = '
      select 
        t.id, s.status, t.tarefa, t.data_cadastrado, t.titulo_tarefa
      from 
        tb_tarefas as t
        left join tb_status as s on (t.id_status = s.id)';
    $stmt = $this->conexao->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
  }

  //Update
  public function update(){
    $query = 'UPDATE tb_tarefas SET tarefa = ?, titulo_tarefa = ? WHERE id = ?';
    $stmt = $this->conexao->prepare($query);
    $stmt->bindValue(1, $this->tarefa->__get('tarefa'));
    $stmt->bindValue(2, $this->tarefa->__get('titulo_tarefa'));
    $stmt->bindValue(3, $this->tarefa->__get('id'));
    return $stmt->execute();
  }

  //delete
  public function remove()
  {
    $query = 'delete from tb_tarefas where id = :id';
    $stmt = $this->conexao->prepare($query);
    $stmt->bindValue(':id', $this->tarefa->__get('id'));
    $stmt->execute();
  }

  public function marked()
  {
    $query = 'update tb_tarefas set id_status = ? where id= ?';
    $stmt = $this->conexao->prepare($query);
    $stmt->bindValue(1, $this->tarefa->__get('id_status'));
    $stmt->bindValue(2, $this->tarefa->__get('id'));
    return $stmt->execute();
  }

  public function pendingTasks()
  {
    $query = '
      select 
        t.id, s.status, t.tarefa, t.data_cadastrado, t.titulo_tarefa
      from 
        tb_tarefas as t
        left join tb_status as s on (t.id_status = s.id)
      where
        t.id_status = :id_status
        ';
    $stmt = $this->conexao->prepare($query);
    $stmt->bindValue(':id_status', $this->tarefa->__get('id_status'));
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
  }
}
