<?php 
    $nomeAluno = $_POST['nomeAluno'];
    $raAluno = $_POST['raAluno'];
    $cursoId = $_POST['curso'];
    include_once('config/conexo.php');
    $db = conectarBanco();
    //query eh destinado a querys fixas (o usuario nao escolhe nada por isso nao usaremos)
    //por segurança
    //primeiro prepara, depois executa para garantir que apenas os valores sejam executados
    $query = $db->prepare('INSERT INTO alunos (nome, ra, curso_id)values(:nome,:ra,:curso_id)');
    $resultado  =$query->execute([
        "nome"=>$nomeAluno,
        "ra"=>$raAluno,
        "curso_id"=>$cursoId]);



        //pra poucas coisas eh melhor esse e quando tem muita info usar o anterior
    //var_dump($resultado);
    //preparamos formulario pegamos informacoes criamos uma nova conexao preparamos um insert into e na //hora de executar de fato passamos os dados pro banco de dados
    if($resultado){
        echo "Aluno cadastrado com sucesso";
    } else {
        echo "Aluno não foi cadastrado corretamente"."<br>";
    }
?>