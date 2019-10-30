<?php 
    $nomeAluno = $_POST['nomeAluno'];
    $raAluno = $_POST['raAluno'];
    $cursoId = $_POST['curso'];
    $host = 'mysql:host=localhost;dbname=escola;port=3307';
    $user = 'root';
    $pass = '';
    $db = new PDO($host, $user, $pass);
    //query eh destinado a querys fixas (o usuario nao escolhe nada por isso nao usaremos)
    //por segurança
    //primeiro prepara, depois executa para garantir que apenas os valores sejam executados
    $query = $db->prepare('INSERT INTO alunos (nome, ra, curso_id)values(?,?,?)');
    $query->execute([$nomeAluno, $raAluno, $cursoId]);
    var_dump($query);
    //preparamos formulario pegamos informacoes criamos uma nova conexao preparamos um insert into e na //hora de executar de fato passamos os dados pro banco de dados
?>