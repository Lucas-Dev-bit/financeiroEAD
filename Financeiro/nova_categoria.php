<?php

require_once '../DAO/UtilDAO.php';
UtilDAO::VerificarLogado();

require_once '../DAO/CategoriaDAO.php';

if(isset($_POST['btnGravar'])){

$nome = $_POST['nome'];

$objDAO = new CategoriaDAO;

$ret = $objDAO->CadastrarCategoria($nome);

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
                        <?php require_once '_msg.php'; ?>
                     <h2>Nova categoria</h2>   
                        <h5>Cadastrar novas categorias</h5>                    
                    </div>
                </div>
                 <hr />
                 <form method="post" action="nova_categoria.php">
                 <div class="form-group">
                    <label>Nome da categoria</label>
                    <input name="nome" id="nomecategoria" class="form-control" placeholder="Digite o nome da categoria. Exemplo: Conta de luz." maxlength="35" />
                </div>
                <button name="btnGravar" onclick="return ValidarNovaCategoria()" type="submit" class="btn btn-success">Salvar</button>
                </form>
    </div>   
</body>
</html>
