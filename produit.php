<?php

include 'header-init.php';

if (!isset($_GET['id'])) {
    echo '{"message":"Invalid}';
    http_response_code(400);
    exit;
}


$idProduit = $_GET['id'];

$requete = $connexion->prepare("SELECT * FROM produit WHERE id = ?");
$requete->execute([$idProduit]);

$Produit = $requete->fetch();

if (!$Produit) {
    echo '{"message" : "produit inexistant"}';
    http_response_code(404);
    exit;
}

echo json_encode($Produit);
