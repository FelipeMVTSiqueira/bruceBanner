<?php
    include_once('config/conexo.php');
    $db = conectarBanco();
    $query = $db->query('SELECT * from alunos');
    $alunos = $query->fetchAll(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Alunos Cadastrados</title>
</head>
<body>
    <label>ALUNOS CADASTRADOS</label>
        <ul name="aluno" id="">
            <?php foreach($alunos as $aluno): ?>
                <li>
                    <?php echo $aluno['nome']; ?> 
                </li>
            <?php endforeach; ?>
        </ul>
        <a href="index.php">Voltar ao início</a>
</body>
</html>