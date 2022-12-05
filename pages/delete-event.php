<?php include('../components/header.html'); ?>
  <main class="container my-4">
    <h1>Deletar evento</h1>
    <p class="mb-5">Tem certeza que deseja deletar esse evento?</p>
    <section>
      <form method="post" method="post" action="../controller/EventController.php">
        <input type="hidden" id="delete_event" name="delete_event" />

        <button type="submit" class="btn btn-danger">Sim, deletar</button>
        <a href="./events.php">Não, voltar</a>
      </form>
    </section>
  </main>
<?php include('../components/footer.html'); ?>