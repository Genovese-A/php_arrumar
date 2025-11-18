<?php
include("valida.php");
?>
<html>
<head>
    <title>Cadastro Usuario</title>
</head>
<body>
    
<div style="width: 1200px; margin: 0 auto;">
    <div style="min-height: 100px; width: 100%; background-color: #DAA520;">
        <div style="width= 50%; float: left">
        <span style="padding-left: 10px;">ola <?=$_SESSION['nome'];?></span>
        </div>

        <div style="width: 50%; float: left; text-align:right;">
        <span style="background-color: blue; margin-right: 10px;"><a href="principal.php"><font color="black"></font><p>VOLTAR</p></a></span>
        <span style="background-color: blue; margin-right: 10px;"> <a href="sair.php"><font color="black">SAIR</font></a></span>
        </div>

    </div>
    <div id="menu" style="width: 200px; background-color: #f4f4f4; min-height: 400; float: left;">
        <h2>Menu</h2>
        <p><a href="cadastroUsuario.php"><font color="black">Cadastro Usuario</font></a></p>
        <p><a href="cadastroFilmes.php"><font color="black">Cadastro Filmes</font></a></p>
        <p>Item 3</p>
    </div>

    <div style=" background-color: #ddd; min-height: 400px; width: 1000px; float:left">
        <h2>Cadastrar Usuario</h2>
        <form method="post" action="inserirUsuario.php">
            CPF: <input type="text" name="cpf"><br>
            NOME: <input type="text" name="nome"><br>
            SENHA: <input type="text" name="senha"><br>
            <input type="submit" value="inserir">
        </form>
        <br><br><br>
        <?php

        include("conexao.php");

        $sql = "select nome,cpf,senha from usuarios";
        if(!$resultado = $conn->query($sql)){
            die("Erro");
        }
        ?>
        <table>
            <tr>
                <td>NOME</td>
                <td>CPF</td>
                <td>SENHA</td>
                <td>ALTERAR</td>
                <td>EXCLUIR</td>
            </tr>
        <?php
            while($row = $resultado->fetch_assoc()){
                ?>
                <tr>
                    <form method="post" action="alterarUsuario.php">
                        <input type="hidden" name="cpfAnterior" value="<?=$row['cpf'];?>">
                        <td><input type="text" name="nome" value="<?=$row['nome'];?>"></td>
                        <td><input type="text" name="cpf" value="<?=$row['cpf'];?>"></td>
                        <td><input type="text" name="senha" value="<?=$row['senha'];?>"></td>
                        <td><input type="submit" value="alterar"></td>
                    </form>
                </tr>
                <?php
            }
        ?>
        </table>
    </div>
</div>

</body>
</html>