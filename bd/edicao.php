<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="index.html">Home</a> | <a href="consulta.php">Consulta</a>
    <hr>
    <h2>Edição de Alunos</h2>
</body>
</html>

<?php

if(!isset($_POST["raAluno"])) {
    echo "Selecione o aluno a ser editado!";
} else {
    $ra = $_POST["raAluno"];

    try {
        include("conexaoBD.php");
        $stmt = $pdo->prepare("SELECT * FROM alunosPHP WHERE ra = :ra");
        $stmt->bindParam(':ra',$ra);
        $stmt->execute();

        $edif = "";
        $enf = "";
        $geo = "";
        $info = "";
        $mec = "";
        $qpd = "";

        while($row = $stmt->fetch()) {

            if ($row["curso"] == "Edificações") {
                $edif = "selected";
            } else if ($row["curso"] == "Enfermagem") {
                $enf = "selected";
            } else if ($row["curso"] == "Geodésia") {
                $geo = "selected";
            } else if ($row["curso"] == "Informática") {
                $info = "selected";
            } else if ($row["curso"] == "Mêcanica") {
                $med = "selected";
            } else if ($row["curso"] == "Qualidade") {
                $qpd = "selected";
            }

            echo "<form method='post' action='edicao.php'>\n";
            echo "RA:<br>\n";
            echo "<input type='text' size='10' name='ra' value='$row[ra]' readonly><br><br>\n";
            echo "Nome:<br>";
            echo "<input type='text' size='30' name='nome' value='$row[nome]'><br><br>\n";
            echo "Curso:<br>\n";
            echo "<select name='curso'>\n
                <option></option>\n
                <option value='edif' $edif >Edificações</option>\n
                <option value='enf' $enf >Enfermagem</option>\n
                <option value='geo' $geo>Geodésia e Cartografia</option>\n
                <option value='info' $info>Informática</option>\n
                <option value='mec' $mec>Mecânica</option>\n
                <option value='qual' $qpd>Qualidade</option>\n
            </select><br><br>\n";
            echo "<input type='submit' value='Salvar Alterações'>\n";
            echo "<hr>\n";
            echo "</form>";
        }

    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
}