<?php

require_once 'conexao.php';

function generateRandomCPF() {
    $cpf = '';
    for ($i = 0; $i < 11; $i++) {
        $cpf .= mt_rand(0, 9);
    }
    return $cpf;
}

function insertClientesData($conn) {
    $nomes = array("João", "Maria", "Pedro", "Ana", "José");
    $sobrenomes = array("Silva", "Santos", "Oliveira", "Souza", "Pereira");
    $emailProviders = array("gmail.com", "hotmail.com", "yahoo.com", "outlook.com");

    // Quantidade de registros a serem gerados
    $quantidadeRegistros = 10;

    for ($i = 0; $i < $quantidadeRegistros; $i++) {
        $nome = $nomes[array_rand($nomes)];
        $sobrenome = $sobrenomes[array_rand($sobrenomes)];
        $cpf = generateRandomCPF();
        $sexo = mt_rand(1,3);
        $debitos = mt_rand(0, 1000);
        $celular = mt_rand(10000000000, 99999999999);
        $email = strtolower($nome . "." . $sobrenome . "@" . $emailProviders[array_rand($emailProviders)]);
        $foto = "cliente" . ($i + 1) . ".jpg"; // Nomes fictícios de arquivos de fotos

        // SQL de inserção
        $sql = "INSERT INTO CLIENTES (NOME_CLIENTE, SOBRENOME_CLIENTE, CPF, ID_SEXO, DEBITOS, CELULAR, EMAIL, FOTO_CLIENT) 
                VALUES ('$nome', '$sobrenome', '$cpf', '$sexo', $debitos, '$celular', '$email', '$foto')";

        // Executa a instrução SQL no banco de dados
        if ($conn->query($sql) === TRUE) {
            echo "Registro inserido:<br>";
            echo "Nome: $nome<br>";
            echo "Sobrenome: $sobrenome<br>";
            echo "CPF: $cpf<br>";
			if ($sexo == '1'){
				$sexo = 'HOMEM';
			};
			if ($sexo == '2'){
				$sexo = 'MUIE';
			};
			if ($sexo == '3'){
				$sexo = 'NAO ESPECIFICADO';
			};
            echo "Sexo: $sexo<br>";
            echo "Débitos: $debitos<br>";
            echo "Celular: $celular<br>";
            echo "Email: $email<br>";
            echo "Foto: $foto<br>";
            echo "<br>";
        } else {
            echo "Erro ao inserir registro: " . $conn->error;
        }
    }
}

// Chama a função para inserir os dados na tabela CLIENTES
insertClientesData($conn);

?>