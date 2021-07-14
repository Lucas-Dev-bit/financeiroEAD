<?php

require_once '../DAO/UtilDAO.php';
UtilDAO::VerificarLogado();

require_once '../DAO/EmpresaDAO.PHP';

if(isset($_POST['btnSalvar'])){

    $nomeEmpresa = $_POST['nomeEmpresa'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];

    $objEmpresa = new EmpresaDAO();

    $ret = $objEmpresa->CadastrarEmpresa($nomeEmpresa, $telefone, $endereco);

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
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                    <form method="post" action="nova_empresa.php">

                        <?php
                            require_once '_msg.php';
                        ?>

                     <h2>Nova Empresa</h2>   
                        <h5>Aqui você poderá cadastrar todas as suas novas empresas</h5>                    
                    </div>
                </div>
                 <hr />
                 <div class="form-group">
                    <label>Nome Empresas*</label>
                    <input name="nomeEmpresa" class="form-control" placeholder="Digite o nome da Empresa" id="nomeempresa" />
                </div>
                <div class="form-group">
                    <label>Telefone</label>
                    <input name="telefone" class="form-control" placeholder="Digite o telefone da Empresa" id="telefone"/>
                </div>
                <div class="form-group">
                    <label>Endereço</label>
                    <input name="endereco" class="form-control" placeholder="Digite o endereço da Empresa" id="endereco"/>
                </div>
                <button name="btnSalvar" onclick="return ValidarNovaEmpresa()" type="submit" class="btn btn-success">Salvar</button>
                </form>
    </div>   
</body>
</html>
