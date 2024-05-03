<?php

include 'header-init.php';

if (!isset($_GET['id'])) {
    echo '{"message":"Invalid}';
    http_response_code(400);
    exit;
}

$idProduit = $_GET['id'];

$requete = $connexion->prepare('DELETE FROM produit WHERE id = ?');

$requete->execute([$idProduit]);

echo '{"message":"Le produit a bien été supprimée"}';
