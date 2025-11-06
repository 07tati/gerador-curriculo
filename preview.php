<?php
session_start();

if (!isset($_SESSION['curriculo_atual'])) {
    header('Location: formulario.php');
    exit;
}

$curriculo = $_SESSION['curriculo_atual'];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preview do Currículo - Gerador de Currículos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .curriculo-container {
            max-width: 210mm;
            min-height: 297mm;
            margin: 0 auto;
            background: white;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            padding: 20mm;
        }
        .header-curriculo {
            border-bottom: 3px solid #3498db;
            padding-bottom: 1rem;
            margin-bottom: 2rem;
        }
        .nome-candidato {
            color: #2c3e50;
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 0.5rem;
        }
        .contato-info {
            color: #7f8c8d;
            font-size: 0.9rem;
        }
        .section-title {
            color: #3498db;
            border-bottom: 2px solid #3498db;
            padding-bottom: 0.5rem;
            margin: 2rem 0 1rem 0;
            font-size: 1.3rem;
        }
        .experiencia-item, .formacao-item {
            margin-bottom: 1.5rem;
        }
        .cargo, .curso {
            font-weight: bold;
            color: #2c3e50;
        }
        .empresa, .instituicao {
            color: #3498db;
            font-style: italic;
        }
        .periodo {
            color: #7f8c8d;
            font-size: 0.9rem;
        }
        .habilidade-item {
            margin-bottom: 0.5rem;
        }
        @media print {
            .no-print {
                display: none;
            }
            .curriculo-container {
                box-shadow: none;
                padding: 0;
            }
        }
    </style>
</head>
<body>
    <div class="container-fluid bg-light py-4">
        <div class="curriculo-container">
            <div class="header-curriculo text-center">
                <h1 class="nome-candidato"><?php echo htmlspecialchars($curriculo['dados_pessoais']['nome_completo']); ?></h1>
                <div class="contato-info">
                    <?php echo htmlspecialchars($curriculo['dados_pessoais']['email']); ?> | 
                    <?php echo htmlspecialchars($curriculo['dados_pessoais']['telefone']); ?>
                    <?php if (!empty($curriculo['dados_pessoais']['endereco'])): ?>
                        | <?php echo htmlspecialchars($curriculo['dados_pessoais']['endereco']); ?>
                    <?php endif; ?>
                </div>
                <div class="contato-info mt-2">
                    <?php if (!empty($curriculo['dados_pessoais']['linkedin'])): ?>
                        LinkedIn: <?php echo htmlspecialchars($curriculo['dados_pessoais']['linkedin']); ?> |
                    <?php endif; ?>
                    <?php if (!empty($curriculo['dados_pessoais']['github'])): ?>
                        GitHub: <?php echo htmlspecialchars($curriculo['dados_pessoais']['github']); ?>
                    <?php endif; ?>
                </div>
            </div>

            <?php if (!empty($curriculo['dados_pessoais']['resumo'])): ?>
            <div class="mb-4">
                <h3 class="section-title">Resumo Profissional</h3>
                <p><?php echo nl2br(htmlspecialchars($curriculo['dados_pessoais']['resumo'])); ?></p>
            </div>
            <?php endif; ?>

            <?php if (!empty($curriculo['experiencia'])): ?>
            <div class="mb-4">
                <h3 class="section-title">Experiência Profissional</h3>
                <?php foreach ($curriculo['experiencia'] as $experiencia): ?>
                    <div class="experiencia-item">
                        <div class="d-flex justify-content-between">
                            <div>
                                <div class="cargo"><?php echo htmlspecialchars($experiencia['cargo']); ?></div>
                                <div class="empresa"><?php echo htmlspecialchars($experiencia['empresa']); ?></div>
                            </div>
                            <div class="periodo text-end">
                                <?php 
                                $dataInicio = DateTime::createFromFormat('Y-m', $experiencia['data_inicio']);
                                echo $dataInicio ? $dataInicio->format('m/Y') : '';
                                
                                if (isset($experiencia['atual']) && $experiencia['atual'] == '1') {
                                    echo ' - Atual';
                                } elseif (!empty($experiencia['data_fim'])) {
                                    $dataFim = DateTime::createFromFormat('Y-m', $experiencia['data_fim']);
                                    echo ' - ' . ($dataFim ? $dataFim->format('m/Y') : '');
                                }
                                ?>
                            </div>
                        </div>
                        <?php if (!empty($experiencia['descricao'])): ?>
                            <p class="mt-2 mb-0"><?php echo nl2br(htmlspecialchars($experiencia['descricao'])); ?></p>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>

            <?php if (!empty($curriculo['formacao'])): ?>
            <div class="mb-4">
                <h3 class="section-title">Formação Acadêmica</h3>
                <?php foreach ($curriculo['formacao'] as $formacao): ?>
                    <div class="formacao-item">
                        <div class="d-flex justify-content-between">
                            <div>
                                <div class="curso"><?php echo htmlspecialchars($formacao['curso']); ?></div>
                                <div class="instituicao"><?php echo htmlspecialchars($formacao['instituicao']); ?></div>
                                <div class="nivel"><?php echo htmlspecialchars($formacao['nivel']); ?></div>
                            </div>
                            <div class="periodo text-end">
                                <?php 
                                if (!empty($formacao['data_inicio'])) {
                                    $dataInicio = DateTime::createFromFormat('Y-m', $formacao['data_inicio']);
                                    echo $dataInicio ? $dataInicio->format('m/Y') : '';
                                    
                                    if (isset($formacao['cursando']) && $formacao['cursando'] == '1') {
                                        echo ' - Cursando';
                                    } elseif (!empty($formacao['data_conclusao'])) {
                                        $dataConclusao = DateTime::createFromFormat('Y-m', $formacao['data_conclusao']);
                                        echo ' - ' . ($dataConclusao ? $dataConclusao->format('m/Y') : '');
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>

            <?php if (!empty($curriculo['habilidades'])): ?>
            <div class="mb-4">
                <h3 class="section-title">Habilidades</h3>
                <div class="row">
                    <?php 
                    $habilidadesPorCategoria = [];
                    foreach ($curriculo['habilidades'] as $habilidade) {
                        $categoria = $habilidade['categoria'] ?: 'Geral';
                        $habilidadesPorCategoria[$categoria][] = $habilidade;
                    }
                    
                    foreach ($habilidadesPorCategoria as $categoria => $habilidades): 
                    ?>
                        <div class="col-md-6">
                            <h6 class="fw-bold"><?php echo htmlspecialchars($categoria); ?></h6>
                            <?php foreach ($habilidades as $habilidade): ?>
                                <div class="habilidade-item">
                                    <?php echo htmlspecialchars($habilidade['nome']); ?>
                                    <span class="badge bg-secondary"><?php echo htmlspecialchars($habilidade['nivel']); ?></span>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endif; ?>
        </div>

        <div class="text-center mt-4 no-print">
            <button onclick="window.print()" class="btn btn-primary me-2">
                <i class="fas fa-print me-2"></i> Imprimir
            </button>
            <a href="gerar_pdf.php" class="btn btn-success me-2">
                <i class="fas fa-download me-2"></i> Baixar PDF
            </a>
            <a href="dashboard.php" class="btn btn-secondary me-2">
                <i class="fas fa-save me-2"></i> Salvar no Perfil
            </a>
            <a href="formulario.php" class="btn btn-outline-primary">
                <i class="fas fa-edit me-2"></i> Editar
            </a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>