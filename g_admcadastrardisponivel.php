<html>
    <head>
        <title>Gravando Imóvel no Disponível</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <script type="text/javascript">
            function gravasuccessfully() {
                setTimeout("window.location='adm.php'", 5000);

            }

            function gravafailed() {
                setTimeout("window.location='admdisponivel.php'", 5000);

            }

        </script>

    </head>
    <body>


        <?php
        include "banco.php";

        session_start();
        if (!isset($_SESSION["usuario"]) || !isset($_SESSION["senha"])) {
            header("Location: index.php");
            exit;
        }


        $disponivelgravar = array();
        $disponivelgravar['bairroimovel'] = mysqli_real_escape_string($conexao, $_POST['bairroimovel']);
        $disponivelgravar['cd_imovel_reduzido'] = mysqli_real_escape_string($conexao, $_POST['cd_imovel_reduzido']);
        $disponivelgravar['matriculaimovel'] = mysqli_real_escape_string($conexao, $_POST['matriculaimovel']);
        $disponivelgravar['cartorioimovel'] = mysqli_real_escape_string($conexao, $_POST['cartorioimovel']);
        $disponivelgravar['averbacaomatricula'] = mysqli_real_escape_string($conexao, $_POST['averbacaomatricula']);
        $disponivelgravar['denominacaoimovel'] = mysqli_real_escape_string($conexao, $_POST['denominacaoimovel']);
        $disponivelgravar['areaimovel'] = mysqli_real_escape_string($conexao, $_POST['areaimovel']);
        $disponivelgravar['situacaoimovel'] = mysqli_real_escape_string($conexao, $_POST['situacaoimovel']);
        $disponivelgravar['observacoesimovel'] = mysqli_real_escape_string($conexao, $_POST['observacoesimovel']);
        $disponivelgravar['tipoimovel'] = mysqli_real_escape_string($conexao, $_POST['tipoimovel']);
        $disponivelgravar['confrontacao_imovel'] = mysqli_real_escape_string($conexao, $_POST['confrontacao_imovel']);
                if (isset($_POST['ultima_vistoria'])){
                    $disponivelgravar['ultima_vistoria']= traduz_data_para_banco($_POST['ultima_vistoria']);
                } else {
                    $disponivelgravar['ultima_vistoria'] = '';
                }
        $c1 = mysqli_real_escape_string($conexao, $_POST['bairroimovel']);
        $c2 = mysqli_real_escape_string($conexao, $_POST['denominacaoimovel']);

        function grava_disponivel($conexao, $disponivelgravar) {
            $sqlGravar = "INSERT INTO disponivel (bairroimovel, cd_imovel_reduzido, matriculaimovel, cartorioimovel, averbacaomatricula, denominacaoimovel, areaimovel, situacaoimovel, observacoesimovel, tipoimovel, confrontacao_imovel, ultima_vistoria) VALUES ('{$disponivelgravar['bairroimovel']}', '{$disponivelgravar['cd_imovel_reduzido']}', '{$disponivelgravar['matriculaimovel']}', '{$disponivelgravar['cartorioimovel']}', '{$disponivelgravar['averbacaomatricula']}', '{$disponivelgravar['denominacaoimovel']}', '{$disponivelgravar['areaimovel']}', '{$disponivelgravar['situacaoimovel']}', '{$disponivelgravar['observacoesimovel']}', '{$disponivelgravar['tipoimovel']}', '{$disponivelgravar['confrontacao_imovel']}', '{$disponivelgravar['ultima_vistoria']}')";
            mysqli_query($conexao, $sqlGravar);
        }

        grava_disponivel($conexao, $disponivelgravar);

        $sqlBusca = "SELECT * FROM disponivel WHERE bairroimovel = '$c1' AND denominacaoimovel = '$c2'";
        $sql = mysqli_query($conexao, $sqlBusca);
        $row = mysqli_num_rows($sql);

        if ($row > 0) {

            echo "<center>Cadastro efetuado com sucesso!</center>";
            echo "<script>gravasuccessfully()</script>";
        } else {
            echo "<center>Falha na gravação.</center>";
            echo "<script>gravafailed()</script>";
        }
        ?>

    </body>

</html>
