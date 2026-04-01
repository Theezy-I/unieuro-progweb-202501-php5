<?php
    require "conexao.php";
    include "menu.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuários</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding-top: 60px;
        }

        .navbar {
            background-color: #333;
            color: white;
            padding: 10px 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
        }

        .navbar .logo {
            margin-left: 20px;
            font-size: 24px;
            font-weight: bold;
        }

        .navbar nav {
            margin-right: 20px;
        }

        .navbar nav a {
            color: white;
            text-decoration: none;
            margin: 0 15px;
            font-size: 16px;
            transition: color 0.3s;
        }

        .navbar nav a:hover {
            color: #4CAF50;
        }

        .content {
            padding: 30px;
            margin-top: 10px;
        }

        .contentgrid {
            padding: 30px;
            margin-top: 5px;
        }

        .welcome-message {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }

        .welcome-message h2 {
            font-size: 24px;
            color: #333;
        }
    </style>
</head>
<body>

    <?php include "menu.php";?>

    <div class="content">
        <div class="welcome-message">
            <h2>Usuários</h2>
        </div>
    </div>

    <div class="contentgrid">
        <table border="1" align="center" width="100%">
            <tr>
                <th bgcolor="#CCCCCC"><input type="checkbox"></th>
                <th bgcolor="#CCCCCC">idusuario</th>
                <th bgcolor="#CCCCCC">Username</th>
                <th bgcolor="#CCCCCC">Password</th>
                <th bgcolor="#CCCCCC">Status</th>
            </tr>

            <?php
            $resultado = pg_query($conn, "SELECT * FROM usuario");

            while ($linha = pg_fetch_assoc($resultado)) {
            ?>
            <tr>
                <td><input type="checkbox"></td>
                <td><?php echo $linha["idusuario"]; ?></td>
                <td><?php echo $linha["username"]; ?></td>
                <td><?php echo $linha["password"]; ?></td>
                <td>
                    <?php
                    if($linha["status"] == "t") echo "Ativo";
                    else echo "Desativado";
                    ?>
                </td>
            </tr>
            <?php
            }
            ?>
        </table>
    </div>

</body>
</html>