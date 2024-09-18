<?php include('../partials/header.php'); ?>

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

<?php include('../partials/footer.php'); ?>
