<html>
    <head>
        <title>Gravando Vistoria</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <script type="text/javascript">
            function gravasuccessfully() {
                setTimeout("window.location='admvistorias.php'", 5000);
                echo
            }
            function gravafailed() {
                setTimeout("window.location='adm_solicita_vistoria.php'", 5000);

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
        
        
        $vistoriagravar['nm_bairro_cidade'] = mysqli_real_escape_string($conexao, $_POST['nm_bairro_cidade']);
        $vistoriagravar['nm_logradouro'] = mysqli_real_escape_string($conexao, $_POST['nm_logradouro']);
        $vistoriagravar['nr_imovel_lograd'] = mysqli_real_escape_string($conexao, $_POST['nr_imovel_lograd']);
        $vistoriagravar['cd_lote_quadra'] = mysqli_real_escape_string($conexao, $_POST['cd_lote_quadra']);
        $vistoriagravar['cd_quadra'] = mysqli_real_escape_string($conexao, $_POST['cd_quadra']);
        //$vistoriagravar['nr_area_terri_lote'] = mysqli_real_escape_string($conexao, $_POST['nr_area_terri_lote']);
        $vistoriagravar['cd_imovel_reduzido'] = mysqli_real_escape_string($conexao, $_POST['cd_imovel_reduzido']);
        $vistoriagravar['denominacao'] = mysqli_real_escape_string($conexao, $_POST['denominacao']);
        $vistoriagravar['observacoes'] = mysqli_real_escape_string($conexao, $_POST['observacoes']);
        $vistoriagravar['fiscal'] = mysqli_real_escape_string($conexao, $_POST['fiscal']);
        $vistoriagravar['fiscalnome'] = $fn['nome'];
        $vistoriagravar['solicitanteNome'] = $dados["nome"];
        $vistoriagravar['dataSolicitacao'] = $data;
        $vistoriagravar['solicitante'] = $dados["matricula"];
        $c1 = mysqli_real_escape_string($conexao, $_POST['fiscal']);
        $c2 = mysqli_real_escape_string($conexao, $_POST['observacoes']);

        function grava_vistoria($conexao, $vistoriagravar) {
            $sqlGravar = "INSERT INTO vistorias (nm_bairro_cidade, nm_logradouro, nr_imovel_lograd, cd_lote_quadra, cd_quadra, cd_imovel_reduzido, denominacao, observacoes, fiscal, solicitanteNome, solicitante, dataSolicitacao, fiscalnome) VALUES ('{$vistoriagravar['nm_bairro_cidade']}', '{$vistoriagravar['nm_logradouro']}', '{$vistoriagravar['nr_imovel_lograd']}', '{$vistoriagravar['cd_lote_quadra']}', '{$vistoriagravar['cd_quadra']}',  '{$vistoriagravar['cd_imovel_reduzido']}', '{$vistoriagravar['denominacao']}', '{$vistoriagravar['observacoes']}', '{$vistoriagravar['fiscal']}', '{$vistoriagravar['solicitanteNome']}', '{$vistoriagravar['solicitante']}', '{$vistoriagravar['dataSolicitacao']}', '{$vistoriagravar['fiscalnome']}')";
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
