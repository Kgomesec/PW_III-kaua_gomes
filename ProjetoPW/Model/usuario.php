<?php

class usuario {
    private $id;
    private $nome;
    private $cpf;
    private $email;
    private $dataNascimento;
    private $senha;

    public function getID() {
        return $this->id;
    }

    public function setID($id) {
        $this->id = $id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getCPF() {
        return $this->cpf;
    }

    public function setCPF($cpf) {
        $this->cpf = $cpf;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getDataNascimento() {
        return $this->dataNascimento;
    }

    public function setDataNascimento($dataNascimento) {
        $this->dataNascimento = $dataNascimento;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }

    public function inserirBD() {
        require_once 'conexaoDB.php';
        $con = new ConexaoDB();
        $conn = $con->conectar();
        if ($conn->connect_error) {
            die("Conexão falhou: " . $conn->connect_error);
        }
        $sql = "INSERT INTO usuario (nome, cpf, email, senha) VALUES ('" . $this->nome . "', '" . $this->cpf . "', '" . $this->email . "', '" . $this->senha . "')";
        if ($conn->query($sql) === TRUE) {
            $this->id = mysqli_insert_id($conn);
            $conn->close();
            return true;
        } else {
            $conn->close();
            return false;
        }
    }

    public function carregarUsuario($cpf) {
        require_once 'conexaoDB.php';
        $con = new ConexaoDB();
        $conn = $con->conectar();
        if ($conn->connect_error) {
            die("Conexão falhou: " . $conn->connect_error);
        }
        $sql = "SELECT * FROM usuario WHERE cpf = '" . $cpf . "'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $this->id = $row['id'];
            $this->nome = $row['nome'];
            $this->cpf = $row['cpf'];
            $this->email = $row['email'];
            $this->senha = $row['senha'];
            $conn->close();
            return true;
        } else {
            $conn->close();
            return false;
        }
    }

    public function atualizarBD() {
        require_once 'conexaoDB.php';
        $con = new ConexaoDB();
        $conn = $con->conectar();
        if ($conn->connect_error) {
            die("Conexão falhou: " . $conn->connect_error);
        }
        $sql = "UPDATE usuario SET nome='" . $this->nome . "', cpf='" . $this->cpf . "', email='" . $this->email . "', senha='" . $this->senha . "' WHERE id=" . $this->id;
        if ($conn->query($sql) === TRUE) {
            $conn->close();
            return true;
        } else {
            $conn->close();
            return false;
        }
    }
}

?>