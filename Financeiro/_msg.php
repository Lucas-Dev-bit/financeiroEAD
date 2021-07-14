<?php

/*if (isset($ret)) {

    if ($ret == 0) {
        echo '<div class="alert alert-warning">
    Preencher o(s) campo(s) obrigatório(s)
    </div>';
    } else if ($ret == 1) {
        echo '<div class="alert alert-success">
    Ação realizada com sucesso!
    </div>';
    } else if ($ret == -1) {
        echo '<div class="alert alert-danger">
    Ocorreu um erro na operação. Tente mais tarde!
    </div>';
    }
}
*/
if (isset($_GET['ret'])) {
    $ret = $_GET['ret'];
}

if (isset($ret)) {

    switch ($ret) {
        case 0:
            echo '<div class="alert alert-warning">
            Preencher o(s) campo(s) obrigatório(s)
            </div>';
            break;

        case 1:
            echo '<div class="alert alert-success">
            Ação realizada com sucesso!
            </div>';
            break;

        case -1:
            echo '<div class="alert alert-danger">
        Ocorreu um erro na operação. Tente mais tarde!
        </div>';
            break;

        case -2:
            echo '<div class="alert alert-danger">
        A senha deverá conter no mínimo 6 caracteres.
        </div>';
            break;

        case -3:
            echo '<div class="alert alert-danger">
        A senha e Repetir Senha não conferem.
        </div>';
            break;

        case -4:
            echo '<div class="alert alert-danger">
        O registro não poderá ser excluído, pois está em uso!
        </div>';
            break;

        case -5:
            echo '<div class="alert alert-danger">
            E-mail já cadastrado. Coloque um outro e-mail!
            </div>';
            break;

        case -6:
            echo '<div class="alert alert-danger">
                Usário não encontrado!
                </div>';
            break;
    }
}
