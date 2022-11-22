<?php include('../components/header.php'); ?>
  <script type="module" src="../dist/bundle.js"></script>
  <main>
    <h1>Eventos</h1>
    <section>
      <a href="./create-event.php">Criar Evento</a>

      <form method="post" method="post" action="../controller/EventController.php">
        <input type="hidden" name="list_events" value="1" />

        <button type="submit">enviar</button>
      </form>
    </section>

    <section>
      <table>
        <thead>
          <th>Cód.</th>
          <th>Título</th>
          <th>Data</th>
          <th>Ações</th>
        </thead>
        <tbody>
        </tbody>
      </table>

    </section>
  </main>
<?php include('../components/footer.php'); ?>