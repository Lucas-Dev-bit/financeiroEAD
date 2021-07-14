<?php

require_once '../DAO/UtilDAO.php';
UtilDAO::VerificarLogado();

require_once '../DAO/ContaDAO.PHP';

if(isset($_POST['btnSalvar'])){

    $banco = $_POST['nomeBanco'];
    $agencia = $_POST['agencia'];
    $numeroConta = $_POST['numeroConta'];
    $saldo = $_POST['saldo'];

    $objdao = new ContaDAO();

    $ret = $objdao->CadastrarConta($banco, $agencia, $numeroConta, $saldo);
}

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
include_once '_head.php';
?>

<body>
    <div id="wrapper">
        <?php
        include_once '_topo.php';
        include_once '_menu.php';
        ?>
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">

                        <?php
                        require_once '_msg.php';
                        ?>

                        <h2>Nova Conta</h2>
                        <h5>Aqui você poderá cadastrar todas as suas contas</h5>
                    </div>
                </div>
                <hr />
                <form method="post" action="nova_conta.php">
                    <div class="form-group">
                        <label>Nome do Banco*</label>
                        <input class="form-control" placeholder="Digite o nome do Banco" name="nomeBanco" id="nomebanco" />
                    </div>
                    <div class="form-group">
                        <label>Agência*</label>
                        <input class="form-control" placeholder="Digite o a agência" name="agencia" id="agencia"/>
                    </div>
                    <div class="form-group">
                        <label>Número da Conta*</label>
                        <input class="form-control" placeholder="Digite o número da conta" name="numeroConta" id="numeroconta"/>
                    </div>
                    <div class="form-group">
                        <label>Saldo*</label>
                        <input class="form-control" placeholder="Digite o saldo da conta" name="saldo" id="saldo"/>
                    </div>
                    <button name="btnSalvar" onclick="return ValidarNovaConta()" type="submit" class="btn btn-success">Salvar</button>
                </form>
            </div>
</body>

</html>