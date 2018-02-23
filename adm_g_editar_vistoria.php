<html>
    <head>
        <title>Gravando Concessão</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <script type="text/javascript">
            function gravasuccessfully() {
                setTimeout("window.location='admvistorias.php'", 5000);
                echo
            }
            function gravafailed() {
                setTimeout("window.location='adm_editar_vistoria.php'", 5000);

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
        $idVistoria = $_POST['idVistoria'];
        $denominacao = $_POST['denominacao'];
        $nm_logradouro = $_POST['nm_logradouro'];
        $nr_imovel_lograd = $_POST['nr_imovel_lograd'];
        $cd_lote_quadra = $_POST['cd_lote_quadra'];
        $cd_quadra = $_POST['cd_quadra'];
        $nm_bairro_cidade = $_POST['nm_bairro_cidade'];
        $cd_imovel_reduzido = $_POST['cd_imovel_reduzido'];
        $observacoes = $_POST['observacoes'];
        $vistoriaNumero = $_POST['vistoriaNumero'];
        $idimovel = $_POST['idimovel'];
        if (isset($_POST['dataVistoria'])) {
            $dataVistoria = traduz_data_para_banco($_POST['dataVistoria']);
        } else {
            $dataVistoria = '';
        }


        $c1 = mysqli_real_escape_string($conexao, $_POST['idVistoria']);
        $c2 = mysqli_real_escape_string($conexao, $_POST['denominacao']);

        $up = "UPDATE vistorias SET denominacao = '$denominacao', nm_logradouro = '$nm_logradouro', nr_imovel_lograd = '$nr_imovel_lograd', cd_lote_quadra = '$cd_lote_quadra', cd_quadra = '$cd_quadra', nm_bairro_cidade = '$nm_bairro_cidade', cd_imovel_reduzido = '$cd_imovel_reduzido', observacoes = '$observacoes', vistoriaNumero = '$vistoriaNumero', idimovel = '$idimovel', dataVistoria = '$dataVistoria'  WHERE idVistoria = '$idVistoria'";
        mysqli_query($conexao, $up);


        $sqlBusca = "SELECT * FROM vistorias WHERE idVistoria = '$c1' AND denominacao = '$c2'";
        $sql = mysqli_query($conexao, $sqlBusca);
        $row = mysqli_num_rows($sql);
        if ($row > 0) {
            echo "<center>Alteração gravada com sucesso!</center>";
            echo "<script>gravasuccessfully()</script>";
        } else {
            echo "<center>Falha na gravação.</center>";
            echo "<script>gravafailed()</script>";
        }
        ?>

    </body>

</html>
