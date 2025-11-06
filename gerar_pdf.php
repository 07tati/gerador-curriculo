<?php
session_start();

if (!isset($_SESSION['curriculo_atual'])) {
    header('Location: formulario.php');
    exit;
}

// Simulação de geração de PDF
header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="curriculo.pdf"');

$_SESSION['mensagem'] = "PDF gerado com sucesso! (Simulação)";
header('Location: preview.php');
exit;
?>