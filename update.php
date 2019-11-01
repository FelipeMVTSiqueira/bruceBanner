<?php
    include_once('config/conexo.php');
    $db = conectarBanco();
    $query = $db->query('SELECT * from cursos');
    $cursos = $query->fetchAll(PDO::FETCH_ASSOC);
    //var_dump($cursos);
    //recuperando o id do aluno na url escrita no chrome (comando abaixo)
    
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    } else if(isset($_POST['id'])){
    } else {
        echo "Voce deve passar um id cara";
        exit;
    }
    //sempre que tem informação que vem do usuario faz com metodo prepare
    //var_dump($aluno);
    if($_POST != []){
        $nomeAluno = $_POST['nomeAluno'];
        $raAluno = $_POST['raAluno'];
        $cursoId = $_POST['curso'];
        $id = $_POST['id'];
        
        $query = $db->prepare('UPDATE alunos 
                               SET nome = :nome, ra = :ra, curso_id = :curso_id 
                               WHERE id = :id');
        $query->execute([
            "id" => $id,
            "curso_id" => $cursoId,
            "ra" => $raAluno,
            "nome" => $nomeAluno
            ]);
        }
        
        $query = $db->prepare('SELECT * FROM alunos WHERE id=?');
        $query->execute([$id]);
        $aluno = $query->fetch(PDO::FETCH_ASSOC);
        ?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="main.js"></script>
</head>
<body>
    <div class="container d-flex justify-content-center mt-3">
        <h2>Cadastro de Aluno</h2>
    </div>
    <div class="container d-flex justify-content-start mt-5">
        <form action="update.php?id= <?php echo $id; ?> " method="post">
            <input type="text" name="id" readonly hidden value="<?php echo $id; ?>">
            <label>Nome do Aluno</label>
            <input type="text" name="nomeAluno" value="<?php echo $aluno['nome'] ?>">
            <label>Ra do Aluno</label>
            <input type="text" name="raAluno" value="<?php echo $aluno['ra'] ?> ">
            <label>Curso</label>
            <select name="curso" id="" value="<?php echo $aluno['curso'] ?>">>
                <?php foreach($cursos as $curso): ?>
                    <?php if($curso['id'] == $aluno['curso_id']): ?>
                    <option selected value="<?php echo $curso['id']; ?>">
                        <?= $curso['nome']; ?> 
                    </option>
                    <?php else: ?>
                    <option value="<?php echo $curso['id']; ?>">
                        <?= $curso['nome']; ?> 
                    </option>
                    <?php endif; ?>

                <?php endforeach; ?>
            </select>
            <button type="submit">Atualizar</button>
        </form>
    </div>
</body>
</html>