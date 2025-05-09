<?php

class Conexao {
    private $host = 'localhost';
    private $db_name = 'lista_de_tarefas';
    private $user = "root";
    private $password = "";

    public function connect() {
        try {
            $connection = new PDO(
                "mysql:host={$this->host};dbname={$this->db_name}",
                $this->user,
                $this->password
            );
            
            return $connection;

        } catch (PDOException $e) {
            echo '<p>Erro na conexão:'.$e->getMessage(). '</p>';
        }
    }
}
?>
