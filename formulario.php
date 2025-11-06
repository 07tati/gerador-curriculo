<?php
// formulario.php
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Formulário de Currículo Completo</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://kit.fontawesome.com/a2e0b3d6e9.js" crossorigin="anonymous"></script>
<style>
body { background-color: #f8f9fa; padding: 20px; font-family: Arial, sans-serif; }
.progress-table { display: flex; justify-content: space-between; margin-bottom: 30px; }
.progress-table div { flex: 1; text-align: center; position: relative; padding-bottom: 10px; cursor: pointer; }
.progress-table div::after { content: ''; position: absolute; width: 100%; height: 4px; background: #ddd; bottom: 0; left: 0; z-index: -1; }
.progress-table div.active::after { background: #0d6efd; }
.progress-table div.active span { font-weight: bold; color: #0d6efd; }

.form-section { display: none; }
.form-section.active { display: block; }

textarea { resize: none; }
</style>
</head>
<body>

<div class="container">
<h2 class="text-center mb-4">Gerador de Currículo Completo</h2>

<!-- Barra de progresso -->
<div class="progress-table">
    <div class="step active" data-step="0"><span>Dados Pessoais</span></div>
    <div class="step" data-step="1"><span>Experiência</span></div>
    <div class="step" data-step="2"><span>Formação</span></div>
</div>

<form method="POST" action="processa_curriculo.php" id="multiStepForm">

    <!-- Etapa 1: Dados Pessoais -->
    <div class="form-section active" data-step="0">
        <div class="mb-3"><label>Nome Completo</label><input type="text" class="form-control" name="dados_pessoais[nome]" required></div>
        <div class="mb-3"><label>E-mail</label><input type="email" class="form-control" name="dados_pessoais[email]" required></div>
        <div class="mb-3"><label>Telefone</label><input type="text" class="form-control" name="dados_pessoais[telefone]"></div>
        <div class="mb-3"><label>Endereço</label><input type="text" class="form-control" name="dados_pessoais[endereco]"></div>
        <div class="mb-3"><label>Data de Nascimento</label><input type="date" class="form-control" name="dados_pessoais[data_nascimento]"></div>
        <div class="mb-3"><label>Resumo Profissional</label><textarea class="form-control" name="dados_pessoais[resumo]" rows="3"></textarea></div>
        <div class="text-end"><button type="button" class="btn btn-primary next-btn">Próximo</button></div>
    </div>

    <!-- Etapa 2: Experiência Profissional -->
    <div class="form-section" data-step="1">
        <div class="mb-3"><label>Empresa</label><input type="text" class="form-control" name="experiencia[empresa]"></div>
        <div class="mb-3"><label>Cargo</label><input type="text" class="form-control" name="experiencia[cargo]"></div>
        <div class="mb-3"><label>Início</label><input type="month" class="form-control" name="experiencia[inicio]"></div>
        <div class="mb-3"><label>Término</label><input type="month" class="form-control" name="experiencia[termino]"></div>
        <div class="mb-3"><label>Descrição das atividades</label><textarea class="form-control" name="experiencia[descricao]" rows="3"></textarea></div>
        <div class="d-flex justify-content-between">
            <button type="button" class="btn btn-secondary prev-btn">Voltar</button>
            <button type="button" class="btn btn-primary next-btn">Próximo</button>
        </div>
    </div>

    <!-- Etapa 3: Formação Acadêmica -->
    <div class="form-section" data-step="2">
        <div class="mb-3"><label>Curso</label><input type="text" class="form-control" name="formacao[curso]"></div>
        <div class="mb-3"><label>Instituição</label><input type="text" class="form-control" name="formacao[instituicao]"></div>
        <div class="mb-3"><label>Ano de Conclusão</label><input type="number" class="form-control" name="formacao[ano]"></div>
        <div class="mb-3"><label>Certificações</label><input type="text" class="form-control" name="formacao[certificacoes]"></div>
        <div class="d-flex justify-content-between">
            <button type="button" class="btn btn-secondary prev-btn">Voltar</button>
            <button type="submit" class="btn btn-success">Finalizar</button>
        </div>
    </div>

</form>
</div>

<script>
const formSections = document.querySelectorAll('.form-section');
const nextBtns = document.querySelectorAll('.next-btn');
const prevBtns = document.querySelectorAll('.prev-btn');
const steps = document.querySelectorAll('.step');
let currentStep = 0;

function showStep(step) {
    formSections.forEach((section, index) => section.classList.toggle('active', index===step));
    steps.forEach((s,index)=> s.classList.toggle('active', index===step));
    currentStep = step;
}

nextBtns.forEach(btn=>btn.addEventListener('click',()=>{ if(currentStep<formSections.length-1) showStep(currentStep+1); }));
prevBtns.forEach(btn=>btn.addEventListener('click',()=>{ if(currentStep>0) showStep(currentStep-1); }));

steps.forEach((s,index)=> s.addEventListener('click',()=>{ showStep(index); }));
</script>

</body>
</html>
