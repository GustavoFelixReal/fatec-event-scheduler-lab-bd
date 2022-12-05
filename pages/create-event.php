<?php include('../components/header.html'); ?>
  <main class="container my-4">
    <h1>Criar Evento</h1>

    <section>
      <form method="post" action="../controller/EventController.php">
        <input type="hidden" name="create_event" value="1" />

        <div role="group">
          <label for="event_name">Nome do Evento</label>
          <input type="text" name="event_name" id="event_name" class="form-control" />
        </div>
        <div role="group">
          <label for="event_date">Data do Evento</label>
          <input type="date" name="event_date" id="event_date" class="form-control" />
        </div>
        <div role="group">
          <label for="event_time">Horário do Evento</label>
          <input type="time" name="event_time" id="event_time" class="form-control" />
        </div>
        <div role="group">
          <label for="event_location">Local do Evento</label>
          <input type="text" name="event_location" id="event_location" class="form-control" />
        </div>
        <div class="my-4" role="group">
          <button type="submit" class="btn btn-primary">Enviar</button>
          <button type="reset" class="btn btn-secondary">Limpar</button>
          <a href="./events.php">Voltar</a>
        </div>
      </form>
    </section>
  </main>
<?php include('../components/footer.html'); ?>