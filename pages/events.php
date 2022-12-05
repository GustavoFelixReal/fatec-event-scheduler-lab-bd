<?php include('../components/header.html'); ?>
  <main class="container my-4">
    <h1>Eventos</h1>
    <section class="my-5">
      <a href="./create-event.php">Criar Evento</a>

      <form method="post" method="post" action="../controller/EventController.php">
        <input type="hidden" name="list_events" value="1" />
      </form>
    </section>

    <section>
      <table class="table table-hover table-striped table-primary">
        <thead>
          <tr>
            <th colspan="4">
              Eventos
            </th>
          </tr>
          <tr>
            <th>Cód.</th>
            <th>Título</th>
            <th>Data</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>

    </section>
  </main>
<?php include('../components/footer.html'); ?>