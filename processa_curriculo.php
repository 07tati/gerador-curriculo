<?php
if($_SERVER['REQUEST_METHOD'] !== 'POST'){
    header('Location: formulario.php');
    exit;
}

// Receber dados do formulário
$nome = $_POST['dados_pessoais']['nome'] ?? '';
$email = $_POST['dados_pessoais']['email'] ?? '';
$telefone = $_POST['dados_pessoais']['telefone'] ?? '';
$endereco = $_POST['dados_pessoais']['endereco'] ?? '';
$data_nascimento = $_POST['dados_pessoais']['data_nascimento'] ?? '';
$resumo = $_POST['dados_pessoais']['resumo'] ?? '';
$empresa = $_POST['experiencia']['empresa'] ?? '';
$cargo = $_POST['experiencia']['cargo'] ?? '';
$inicio = $_POST['experiencia']['inicio'] ?? '';
$termino = $_POST['experiencia']['termino'] ?? '';
$descricao = $_POST['experiencia']['descricao'] ?? '';
$curso = $_POST['formacao']['curso'] ?? '';
$instituicao = $_POST['formacao']['instituicao'] ?? '';
$ano = $_POST['formacao']['ano'] ?? '';
$certificacoes = $_POST['formacao']['certificacoes'] ?? '';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Currículo Gerado</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
<style>
body { background-color: #f8f9fa; padding: 20px; font-family: Arial, sans-serif; }
.curriculo { background: #fff; padding: 30px; border-radius: 10px; box-shadow: 0 10px 25px rgba(0,0,0,0.1); max-width: 800px; margin: auto; }
h2,h3,h4 { margin-top: 20px; }
.actions { margin-top: 30px; text-align: center; }
.actions button { margin: 5px; }
</style>
</head>
<body>

<div class="curriculo" id="curriculoContent">
    <h2 class="text-center">Currículo</h2>

    <h3><?php echo htmlspecialchars($nome); ?></h3>
    <p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?><br>
       <strong>Telefone:</strong> <?php echo htmlspecialchars($telefone); ?><br>
       <strong>Endereço:</strong> <?php echo htmlspecialchars($endereco); ?><br>
       <strong>Data de Nascimento:</strong> <?php echo htmlspecialchars($data_nascimento); ?></p>

    <hr>
    <h4>Resumo Profissional</h4>
    <p><?php echo nl2br(htmlspecialchars($resumo)); ?></p>

    <hr>
    <h4>Experiência Profissional</h4>
    <p><strong>Empresa:</strong> <?php echo htmlspecialchars($empresa); ?><br>
       <strong>Cargo:</strong> <?php echo htmlspecialchars($cargo); ?><br>
       <strong>Período:</strong> <?php echo htmlspecialchars($inicio) .' até '. htmlspecialchars($termino); ?><br>
       <strong>Atividades:</strong> <?php echo nl2br(htmlspecialchars($descricao)); ?></p>

    <hr>
    <h4>Formação Acadêmica</h4>
    <p><strong>Curso:</strong> <?php echo htmlspecialchars($curso); ?><br>
       <strong>Instituição:</strong> <?php echo htmlspecialchars($instituicao); ?><br>
       <strong>Ano:</strong> <?php echo htmlspecialchars($ano); ?><br>
       <strong>Certificações:</strong> <?php echo htmlspecialchars($certificacoes); ?></p>
</div>

<div class="actions">
    <button class="btn btn-success" id="baixarPDF">Baixar PDF</button>
    <button class="btn btn-primary" onclick="window.print()">Imprimir</button>
    <a href="dashboard.php" class="btn btn-secondary">Voltar ao Dashboard</a>
</div>

<script>
document.getElementById('baixarPDF').addEventListener('click', () => {
    const element = document.getElementById('curriculoContent');
    const opt = {
        margin:       0.5,
        filename:     '<?php echo "curriculo_".preg_replace("/\s+/","_",$nome); ?>.pdf',
        image:        { type: 'jpeg', quality: 0.98 },
        html2canvas:  { scale: 2 },
        jsPDF:        { unit: 'in', format: 'a4', orientation: 'portrait' }
    };
    html2pdf().set(opt).from(element).save();
});
</script>

</body>
</html>