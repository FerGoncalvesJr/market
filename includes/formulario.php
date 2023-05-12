<main>

  <section>
    <a href="index.php">
      <button class="btn btn-success">Voltar</button>
    </a>
  </section>

  <h2 class="mt-3"><?=TITLE?></h2>

  <form method="post">

    <div class="form-group">
      <label>Valor</label>
      <input type="text" class="form-control" name="value" value="<?=$obSale->value?>">
    </div>

    <div class="form-group">
      <label>Imposto</label>
      <input class="form-control" name="tax" type="number" value="<?=$obSale->tax?>">
    </div>

    <div class="form-group">
      <button type="submit" class="btn btn-success">Enviar</button>
    </div>

  </form>

</main>