<?php
// dashboard.php
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard - Gerador de Currículo</title>

<!-- Bootstrap + FontAwesome -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://kit.fontawesome.com/a2e0b3d6e9.js" crossorigin="anonymous"></script>

<style>
body {
    background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    font-family: 'Segoe UI', sans-serif;
}

.dashboard-container {
    background: #fff;
    border-radius: 15px;
    padding: 40px;
    max-width: 700px;
    width: 90%;
    text-align: center;
    box-shadow: 0 20px 40px rgba(0,0,0,0.2);
    transition: transform 0.3s ease;
}

.dashboard-container:hover {
    transform: translateY(-5px);
}

h1 {
    font-weight: 700;
    color: #333;
    margin-bottom: 30px;
}

.btn-primary {
    background: #6a11cb;
    border: none;
    padding: 15px 30px;
    font-size: 1.2rem;
    border-radius: 50px;
    transition: all 0.3s ease;
}

.btn-primary:hover {
    background: #2575fc;
    transform: scale(1.05);
}

.card-icon {
    font-size: 2.5rem;
    color: #fff;
    margin-bottom: 15px;
}

.card {
    background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
    border: none;
    color: #fff;
    border-radius: 15px;
    padding: 30px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.card:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 30px rgba(0,0,0,0.3);
}
</style>
</head>
<body>

<div class="dashboard-container">
    <h1>Bem-vindo ao Gerador de Currículos</h1>

    <div class="row g-4">
        <div class="col-md-6">
            <div class="card text-center">
                <i class="fas fa-plus-circle card-icon"></i>
                <h4 class="mt-2">Criar Novo Currículo</h4>
                <p class="mb-3">Comece do zero e preencha seus dados profissionais.</p>
                <a href="formulario.php" class="btn btn-light">Criar</a>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card text-center">
                <i class="fas fa-file-alt card-icon"></i>
                <h4 class="mt-2">Currículos Salvos</h4>
                <p class="mb-3">Veja os currículos que você já criou e faça download.</p>
                <a href="preview.php" class="btn btn-light">Visualizar</a>
            </div>
        </div>
    </div>

    <div class="mt-4">
        <a href="index.php" class="btn btn-primary"><i class="fas fa-home me-2"></i>Voltar à Página Inicial</a>
    </div>
</div>

</body>
</html>