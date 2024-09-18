<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cálculo de Média</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center">Cálculo de Média</h2>
    <form method="POST" class="mb-4">
        <div class="mb-3">
            <label for="nota1" class="form-label">Nota 1</label>
            <input type="number" step="0.1" class="form-control" id="nota1" name="nota1" required>
        </div>
        <div class="mb-3">
            <label for="nota2" class="form-label">Nota 2</label>
            <input type="number" step="0.1" class="form-control" id="nota2" name="nota2" required>
        </div>
        <div class="mb-3">
            <label for="nota3" class="form-label">Nota 3</label>
            <input type="number" step="0.1" class="form-control" id="nota3" name="nota3" required>
        </div>
        <div class="mb-3">
            <label for="nota4" class="form-label">Nota 4</label>
            <input type="number" step="0.1" class="form-control" id="nota4" name="nota4" required>
        </div>
        <button type="submit" class="btn btn-primary">Calcular Média</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && !isset($_POST['notaRecuperacao'])) {
        $nota1 = floatval($_POST['nota1']);
        $nota2 = floatval($_POST['nota2']);
        $nota3 = floatval($_POST['nota3']);
        $nota4 = floatval($_POST['nota4']);

        $media = ($nota1 + $nota2 + $nota3 + $nota4) / 4;
        $conceito = "";
        $mensagem = "";

        if ($media >= 9) {
            $conceito = "A";
            $mensagem = "Aprovado com Louvor";
        } elseif ($media >= 7) {
            $conceito = "B";
            $mensagem = "Aluno Aprovado";
        } elseif ($media >= 4) {
            $conceito = "C";
            $mensagem = "Recuperação, sua chance de passar";
        } else {
            $conceito = "D";
            $mensagem = "Poxa vida, vamos tentar novamente ano que vem";
        }

        echo "<div class='alert alert-info'>";
        echo "<p>Média: <strong>" . number_format($media, 2) . "</strong></p>";
        echo "<p>Conceito: <strong>$conceito</strong></p>";
        echo "<p>$mensagem</p>";
        echo "</div>";

        // Se o aluno estiver em recuperação
        if ($conceito == "C") {
            echo "
            <form method='POST'>
                <div class='mb-3'>
                    <label for='notaRecuperacao' class='form-label'>Nota da Recuperação</label>
                    <input type='number' step='0.1' class='form-control' id='notaRecuperacao' name='notaRecuperacao' required>
                </div>
                <input type='hidden' name='media' value='$media'>
                <button type='submit' class='btn btn-warning'>Verificar Recuperação</button>
            </form>";
        }
    }

    // Verificar recuperação
    if (isset($_POST['notaRecuperacao'])) {
        $notaRecuperacao = floatval($_POST['notaRecuperacao']);
        $media = floatval($_POST['media']);
        $novaMedia = ($notaRecuperacao + $media);

        if ($novaMedia >= 10) {
            echo "<div class='alert alert-success'>Parabéns, você foi aprovado na recuperação!</div>";
        } else {
            echo "<div class='alert alert-danger'>Infelizmente, você foi reprovado.</div>";
        }
    }
    ?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
