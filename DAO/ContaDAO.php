<?php

require_once 'Conexao.php';
require_once 'UtilDAO.php';

class ContaDAO extends Conexao
{

    public function CadastrarConta($nomeBanco, $agencia, $numeroConta, $saldo)
    {

        if (trim($nomeBanco) == '' || trim($agencia) == '' || trim($numeroConta) == '' || trim($saldo) == '') {
            return 0;
        }

        $conexao = parent::retornarConexao();

        $comando_sql = 'insert into tb_conta
                        (banco_conta, agencia_conta, numero_conta, saldo_conta, id_usuario)
                        values
                        (?, ?, ?, ?, ?);';

        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);

        $sql->bindValue(1, $nomeBanco);
        $sql->bindValue(2, $agencia);
        $sql->bindValue(3, $numeroConta);
        $sql->bindValue(4, $saldo);
        $sql->bindValue(5, UtilDAO::CodigoLogado());

        try {
            $sql->execute();

            return 1;
        } catch (Exception $ex) {
            echo $ex->getMessage();

            return -1;
        }
    }

    public function ConsultarConta()
    {

        $conexao = parent::retornarConexao();

        $comando_sql = 'select id_conta,
                               banco_conta,
                               agencia_conta,
                               numero_conta,
                               saldo_conta
                          from tb_conta
                         where id_usuario = ? order by banco_conta';

        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);

        $sql->bindValue(1, UtilDAO::CodigoLogado());

        $sql->setFetchMode(PDO::FETCH_ASSOC);

        $sql->execute();

        return $sql->fetchAll();
    }

    public function DetalharConta($idConta)
    {

        if ($idConta == '') {
            return 0;
        }

        $conexao = parent::retornarConexao();

        $comando_sql = 'select id_conta,
                               banco_conta,
                               agencia_conta,
                               saldo_conta,
                               numero_conta
                          from tb_conta
                         where id_conta = ?
                           and id_usuario = ?';

        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);

        $sql->bindValue(1, $idConta);
        $sql->bindValue(2, UtilDAO::CodigoLogado());

        $sql->setFetchMode(PDO::FETCH_ASSOC);

        $sql->execute();

        return $sql->fetchAll();
    }

    public function AlterarConta($idConta, $nomeBanco, $agencia, $numeroConta, $saldo)
    {

        if (trim($nomeBanco) == '' || trim($agencia) == '' || trim($numeroConta) == '' || trim($saldo) == '' || $idConta == '') {
            return 0;
        }

        $conexao = parent::retornarConexao();

        $comando_sql = 'update tb_conta
                           set banco_conta = ?,
                               agencia_conta = ?,
                               numero_conta = ?,
                               saldo_conta = ?
                         where id_conta = ?
                           and id_usuario = ?';

        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);

        $sql->bindValue(1, $nomeBanco);
        $sql->bindValue(2, $agencia);
        $sql->bindValue(3, $numeroConta);
        $sql->bindValue(4, $saldo);
        $sql->bindValue(5, $idConta);
        $sql->bindValue(6, UtilDAO::CodigoLogado());

        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return -1;
        }
    }

    public function ExcluirConta($idConta)
    {

        if ($idConta == '') {
            return 0;
        }

        $conexao = parent::retornarConexao();

        $comando_sql = 'delete 
                        from tb_conta
                        where id_conta = ?
                        and id_usuario = ?';

        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);

        $sql->bindValue(1, $idConta);
        $sql->bindValue(2, UtilDAO::CodigoLogado());

        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            return -4;
        }
    }
}
