<?php
session_start();
if (isset($_SESSION['usuario_id'])) {
    header('Location: dashboard.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerador de Currículos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .hero-section {
            background: linear-gradient(135deg, #2c3e50 0%, #3498db 100%);
            color: white;
            padding: 100px 0;
        }
        .feature-icon {
            font-size: 3rem;
            color: #3498db;
            margin-bottom: 1rem;
        }
        .btn-primary {
            background-color: #3498db;
            border-color: #3498db;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fas fa-file-alt"></i> CurrículoPro
            </a>
        </div>
    </nav>

    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-4 fw-bold">Crie seu currículo profissional em minutos</h1>
                    <p class="lead mb-4">Uma ferramenta completa para criar currículos impressionantes que destacam suas habilidades e experiências.</p>
                    <a href="dashboard.php" class="btn btn-primary btn-lg">
                        <i class="fas fa-plus-circle"></i> Começar Agora
                    </a>
                </div>
                <div class="col-lg-6">
                    <img src="https://via.placeholder.com/500x300/3498db/ffffff?text=Preview+Currículo" 
                         alt="Preview do Currículo" class="img-fluid rounded shadow">
                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-4 mb-4">
                    <div class="feature-icon">
                        <i class="fas fa-magic"></i>
                    </div>
                    <h3>Fácil de Usar</h3>
                    <p>Interface intuitiva que guia você passo a passo na criação do currículo.</p>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="feature-icon">
                        <i class="fas fa-download"></i>
                    </div>
                    <h3>Download em PDF</h3>
                    <p>Gere seu currículo em PDF profissional para enviar para empresas.</p>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="feature-icon">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                    <h3>Responsivo</h3>
                    <p>Layout adaptável que funciona perfeitamente em todos os dispositivos.</p>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>