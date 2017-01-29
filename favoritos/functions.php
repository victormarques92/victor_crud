<?php

require_once('../config.php');
require_once(DBAPI);

$favoritos = null;
$favorito = null;

/**
 *  Listagem de Favoritos
 */
function index() {
    global $favoritos;
    $favoritos = find_all('favoritos');
}

/**
 *  Cadastro de Favoritos
 */
function add() {
    if (!empty($_POST['favorito'])) {

        $today = date_create('now', new DateTimeZone('America/Sao_Paulo'));
        $favorito = $_POST['favorito'];
        $favorito['modified'] = $favorito['created'] = $today->format("Y-m-d H:i:s");

        save('favoritos', $favorito);
        header('location: index.php');
    }
}

/**
 * 	Atualizacao/Edicao de Favorito
 */
function edit() {
    $now = date_create('now', new DateTimeZone('America/Sao_Paulo'));
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        if (isset($_POST['favorito'])) {
            $favorito = $_POST['favorito'];
            $favorito['modified'] = $now->format("Y-m-d H:i:s");
            update('favoritos', $id, $favorito);
            header('location: index.php');
        } else {
            global $favorito;
            $favorito = find('favoritos', $id);
        }
    } else {
        header('location: index.php');
    }
}

/**
 *  Visualização de um Favorito
 */
function view($id = null) {
    global $favorito;
    $favorito = find('favoritos', $id);
}

/**
 *  Exclusão de um Favorito
 */
function delete($id = null) {
    global $favorito;
    $favorito = remove('favoritos', $id);
    header('location: index.php');
}
