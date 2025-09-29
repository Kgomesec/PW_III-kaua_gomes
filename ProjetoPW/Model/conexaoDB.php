<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
            Class ConexãoDB {
                private $serverName = "localhost";
                private $userName = "root";
                private $password = "";
                private $dbNome = "projeto_final";
            

                public function conectar() {

                //Cria conexão
                $conn = new mysqli($this->serverName, $this->userName, $this->password,
                $this->dbName);

                //Verifica se houve erro na conexão
                    if ($conn->connect_error) {
                    die("Falha na conexão: " . $conn->connect_error);
                    }

                //Mensagem de sucesso
                echo "Conexão realizada com sucesso!";


                return $conn;
                }
            }
            //Aqui você instancia a classe e chama o método
            $conexao = new ConexaoDB();
            $conexao->conectar();
    ?>
</body>
</html>