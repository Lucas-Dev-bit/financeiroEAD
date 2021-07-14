<?php

require_once 'Conexao.php';
require_once 'UtilDAO.php';


class CategoriaDAO extends Conexao
{

    public function CadastrarCategoria($nome)
    {

        if (trim($nome) == '') {
            return 0;
        }
        // 1 passo: criar uma variavel que recebera o OBJ da conexao
        $conexao = parent::retornarConexao();

        // 2 passo: criar uma variavel que recebera o texto do comando SQL que devera ser exectado no BANCO DE DADOS
        $comando_sql = 'insert into tb_categoria
                        (nome_categoria, id_usuario)
                        values 
                        (?, ?);';

        // 3 passo: Criar um OBJ que sera configurado e levado no BANCO DE DADOS para ser executado
        $sql = new PDOStatement();

        //4 passo: Colocar dentro do OBJ $sql a conexão preparada para executar o comando sql
        $sql = $conexao->prepare($comando_sql);

        //5 passo: Verificar se no comando_sql eu tenho ? para ser configurado. Se tiver, configurar os bindValues
        $sql->bindValue(1, $nome);
        $sql->bindValue(2, UtilDAO::CodigoLogado());

        try {
            //6 passo: Executar no BANCO DE DADOS
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return -1;
        }
    }

    public function ExcluirCategoria($idCategoria)
    {

        if ($idCategoria == '') {
            return 0;
        }

        $conexao = parent::retornarConexao();

        $comando_sql = 'delete
                        from tb_categoria
                        where id_categoria = ?
                        and id_usuario = ?';

        $sql = new PDOStatement();

        $sql = $conexao->prepare($comando_sql);

        $sql->bindValue(1, $idCategoria);
        $sql->bindValue(2, UtilDAO::CodigoLogado());

        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            return -4;
        }
    }
    public function ConsultarCategoria()
    {

        $conexao = parent::retornarConexao();

        $comando_sql = 'select id_categoria,
                               nome_categoria
                          from tb_categoria
                         where id_usuario = ? order by nome_categoria';

        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);

        $sql->bindValue(1, UtilDAO::CodigoLogado());

        $sql->setFetchMode(PDO::FETCH_ASSOC);

        $sql->execute();

        return $sql->fetchAll();
    }

    public function DetalharCategoria($idCategoria)
    {
        $conexao = parent::retornarConexao();
        $comando_sql = 'select id_categoria,
                        nome_categoria
                        from tb_categoria
                        where id_categoria = ?
                        and id_usuario = ?';

        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);
        $sql->bindValue(1, $idCategoria);
        $sql->bindValue(2, UtilDAO::CodigoLogado());

        $sql->setFetchMode(PDO::FETCH_ASSOC);

        $sql->execute();

        return $sql->fetchAll();
    }

    public function AlterarCategoria($nomeCategoria, $idCategoria)
    {

        if (trim($nomeCategoria) == '' || $idCategoria == '') {
            return 0;
        }

        $conexao = parent::retornarConexao();
        $comando_sql = 'update tb_categoria
                        set nome_categoria = ?
                        where id_categoria = ?
                        and id_usuario = ?';

        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);

        $sql->bindValue(1, $nomeCategoria);
        $sql->bindValue(2, $idCategoria);
        $sql->bindValue(3, UtilDAO::CodigoLogado());

        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return -1;
        }
    }
}
