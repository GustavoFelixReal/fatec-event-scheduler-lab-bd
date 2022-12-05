<?php include('../components/header.html'); ?>
  <style>
    #event_title {
      display: flex;
      justify-content: start;
      align-items: center;
      gap: 5px;
    }
  </style>
  <main class="container my-4">
    <section>
      <a href="./events.php">Voltar</a>
    </section>

    <section id="event_title">
      <span class="badge bg-primary" id="event_id"></span>
      <h1 id="event_name">Detalhes do Evento</h1>
    </section>

    <section class="btn-group my-5">
      <a id="edit_event" href="./edit-event.php?id="class="btn btn-info">Editar</a>
      <a id="delete_event" href="./delete-event.php?id=" class="btn btn-danger">Excluir</a>
    </section>

    <section>
      <h2>Local do Evento</h2>
      <p id="event_location"></p>

      <h2>Data do Evento</h2>
      <p id="event_date"></p>

      <h2>Horário do Evento</h2>
      <p id="event_time"></p>
    </section>
  </main>
<?php include('../components/footer.html'); ?>