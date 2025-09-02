<?php

Class ConexaoDB {
    private $serverName = "localhost";
    private $userName = "root";
    private $password = "";
    private $dbName = "projeto_final";

    public function conectar() {
        $conn = new mysqli($this->serverName, $this->userName, $this->password, $this->dbName);
        
        if ($conn->connect_error) {
            die("Conexão falhou: " . $conn->connect_error);
        }

        echo "Conexão realizada com sucesso!";

        return $conn;
    }
}

$conexao = new ConexaoDB();
$conexao->conectar();

?>