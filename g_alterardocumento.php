<html>
    <head>
        <title>Gravando Concessão</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <script type="text/javascript">
            function gravasuccessfully() {
                setTimeout("window.location='adm.php'", 5000);
                echo
            }
            function gravafailed() {
                setTimeout("window.location='alterardocumento.php'", 5000);

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


        $iddocumento = $_POST['iddocumento'];
        $documento = mysqli_real_escape_string($conexao, $_POST['documento']);
        $despachado = mysqli_real_escape_string($conexao, $_POST['despachado']);
        $observacoes = mysqli_real_escape_string($conexao, $_POST['observacoes']);
        if (isset($_POST['responderate'])) {
            $responderate = traduz_data_para_banco($_POST['responderate']);
        } else {
            $responderate = '';
        }
        $respondido = mysqli_real_escape_string($conexao, $_POST['respondido']);


        $c1 = mysqli_real_escape_string($conexao, $_POST['documento']);
        $c2 = mysqli_real_escape_string($conexao, $_POST['despachado']);

        $up = "UPDATE documentos SET documento = '$documento', despachado = '$despachado', observacoes = '$observacoes', responderate = '$responderate', respondido = '$respondido'  WHERE iddocumento = '$iddocumento'";
        mysqli_query($conexao, $up);


        $sqlBusca = "SELECT * FROM documentos WHERE documento = '$c1' AND despachado = '$c2'";
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
