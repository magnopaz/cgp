<html>
    <head>
        <title>Gravando Vistoria</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <script type="text/javascript">
            function gravasuccessfully() {
                setTimeout("window.location='admdisponivel.php'", 5000);
                echo
            }
            function gravafailed() {
                setTimeout("window.location='adm_solicitarVistoria2.php'", 5000);

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
        include "userdata.php";
        $data = date('Y/m/d');
        $vistoriagravar = array();

        $matricula = ($_POST['fiscal']);

        $sql = "SELECT nome FROM usuarios WHERE matricula = '$matricula'";
        $query = $conexao->query($sql);
        $fn = $query->fetch_array();
        $idimovel = $_POST['idimovel'];
        $sql = "SELECT * FROM disponivel WHERE idimovel = '$idimovel'";
        $query = $conexao->query($sql);
        $imovel = $query->fetch_array();
        $cd_bairro = $imovel['bairroimovel'];
        $sql = "SELECT * FROM bairros WHERE cd_bairro = '$cd_bairro'";
        $query = $conexao->query($sql);
        $bairro = $query->fetch_array();
        
        
        $vistoriagravar['nm_bairro_cidade'] = mysqli_real_escape_string($conexao, $bairro['nm_bairro_cidade']);
        $vistoriagravar['nm_logradouro'] = mysqli_real_escape_string($conexao, $_POST['nm_logradouro']);
        $vistoriagravar['nr_imovel_lograd'] = mysqli_real_escape_string($conexao, $_POST['nr_imovel_lograd']);
        $vistoriagravar['cd_lote_quadra'] = mysqli_real_escape_string($conexao, $_POST['cd_lote_quadra']);
        $vistoriagravar['cd_quadra'] = mysqli_real_escape_string($conexao, $_POST['cd_quadra']);
        $vistoriagravar['nr_area_terri_lote'] = mysqli_real_escape_string($conexao, $imovel['areaimovel']);
        $vistoriagravar['cd_imovel_reduzido'] = mysqli_real_escape_string($conexao, $imovel['cd_imovel_reduzido']);
        $vistoriagravar['denominacao'] = mysqli_real_escape_string($conexao, $imovel['denominacaoimovel']);
        $vistoriagravar['idimovel'] = mysqli_real_escape_string($conexao, $imovel['idimovel']);
        $vistoriagravar['observacoes'] = mysqli_real_escape_string($conexao, $_POST['observacoes']);
        $vistoriagravar['fiscal'] = mysqli_real_escape_string($conexao, $_POST['fiscal']);
        $vistoriagravar['fiscalnome'] = $fn['nome'];
        $vistoriagravar['solicitanteNome'] = $dados["nome"];
        $vistoriagravar['dataSolicitacao'] = $data;
        $vistoriagravar['solicitante'] = $dados["matricula"];
        $c1 = mysqli_real_escape_string($conexao, $_POST['fiscal']);
        $c2 = mysqli_real_escape_string($conexao, $_POST['observacoes']);

        function grava_vistoria($conexao, $vistoriagravar) {
            $sqlGravar = "INSERT INTO vistorias (nm_bairro_cidade, nm_logradouro, nr_imovel_lograd, cd_lote_quadra, cd_quadra, nr_area_terri_lote, cd_imovel_reduzido, denominacao, observacoes, fiscal, solicitanteNome, solicitante, dataSolicitacao, fiscalnome, idimovel) VALUES ('{$vistoriagravar['nm_bairro_cidade']}', '{$vistoriagravar['nm_logradouro']}', '{$vistoriagravar['nr_imovel_lograd']}', '{$vistoriagravar['cd_lote_quadra']}', '{$vistoriagravar['cd_quadra']}', '{$vistoriagravar['nr_area_terri_lote']}', '{$vistoriagravar['cd_imovel_reduzido']}', '{$vistoriagravar['denominacao']}', '{$vistoriagravar['observacoes']}', '{$vistoriagravar['fiscal']}', '{$vistoriagravar['solicitanteNome']}', '{$vistoriagravar['solicitante']}', '{$vistoriagravar['dataSolicitacao']}', '{$vistoriagravar['fiscalnome']}', '{$vistoriagravar['idimovel']}')";
            mysqli_query($conexao, $sqlGravar);
        }

        grava_vistoria($conexao, $vistoriagravar);

        $sqlBusca = "SELECT * FROM vistorias WHERE fiscal = '$c1' AND observacoes = '$c2'";
        $sql = mysqli_query($conexao, $sqlBusca);
        $row = mysqli_num_rows($sql);
        if ($row > 0) {
            echo "<center>Vistoria solicitada com sucesso!</center>";
            echo "<script>gravasuccessfully()</script>";
        } else {
            echo "<center>Falha na gravação.</center>";
            echo "<script>gravafailed()</script>";
        }
        ?>

    </body>

</html>
