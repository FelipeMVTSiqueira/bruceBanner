<?php
    $host = 'mysql:host=localhost;dbname=escola;port=3307';
    $user = 'root';
    $pass = '';
    $db = new PDO($host, $user, $pass);
    $query = $db->query('SELECT * from cursos');
    $cursos = $query->fetchAll(PDO::FETCH_ASSOC);
    //var_dump($cursos);
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
    <h2>Cadastro de Aluno</h2>
    <div class="container d-flex justify-content-center mt-5">
        <form action="cadastroAluno.php" method="post">
            <label>Nome do Aluno</label>
            <input type="text" name="nomeAluno">
            <label>Ra do Aluno</label>
            <input type="text" name="raAluno">
            <label>Curso</label>
            <select name="curso" id="">
                <?php foreach($cursos as $curso): ?>
                    <option value="<?php echo $curso['id']; ?>">
                        <?php echo $curso['nome']; ?> 
                    </option>
                <?php endforeach; ?>
            </select>
            <button type="submit">Cadastrar</button>
        </form>
    </div>
</body>
</html>