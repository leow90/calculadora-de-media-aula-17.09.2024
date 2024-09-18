<?php include('../partials/header.php'); ?>

<h2 class="text-center">Cálculo de Média</h2>
<form method="POST" action="resultado.php">
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

<?php include('../partials/footer.php'); ?>
