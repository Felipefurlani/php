<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta</title>
</head>
<body>
    <a href="index.html"></a>
    <hr>
    <h2>Consulta de Alunos</h2>
    <form method="post">
        RA:<br>
        <input type="text" size="10" name="ra">
        <br>
        <input type="submit" value="Consultar">
        <hr>
    </form>
</body>
</html>

<?php 
    if ($_SERVER["REQUEST_METHOD"] === 'POST') {
        
        include("conexao.php");

        if (isset($_POST["ra"]) && ($_POST["ra"] != "")) {
            $ra = $_POST["ra"];
            $stmt = $pdo->prepare("select * from alunosPHP where ra = :ra order by nome , curso");
            $stmt->bindParam(':ra', $ra);
        } else {
            $stmt = $pdo->prepare("select * from alunosPHP order by nome, curso");
        }

        try {
            $stmt->execute();

            echo "<form method='post'>";
            echo "<table border='1px'>";
            echo "<tr>";
            echo "<th></th>";
            echo "<th>RA</th>";
            echo "<th>Nome</th>";
            echo "<th>Curso</th>";
            echo "</tr>";

            while ($row = $stmt->fetch()) {
                echo "<tr>";
                echo "<td><input type='radio' name='ra' value='" . $row['ra'] . "'>";
                echo "<td>" . $row['ra'] . "</td>";
                echo "<td>" . $row['nome'] . "</td>";
                echo "<td>" . $row['curso'] . "</td>";
                echo "</tr>";
            }

            echo "</table><br>";

            echo "<button type='submit' formaction='remove.php'>Excluir Aluno</button>";
            echo "<button type='submit' formaction='edicao.php'>Editar Aluno</button>";
            echo "</form>";
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }

        $pdo = null;

    }


?>