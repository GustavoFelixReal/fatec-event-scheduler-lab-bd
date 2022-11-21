<?php include('../components/header.php'); ?>
  <main>
    <h1>Criar Evento</h1>

    <section>
      <form method="post" action="../controller/EventController.php">
        <div role="group">
          <label for="event_name">Nome do Evento</label>
          <input type="text" name="event_name" id="event_name" />
        </div>
        <div role="group">
          <label for="event_date">Data do Evento</label>
          <input type="date" name="event_date" id="event_date" />
        </div>
        <div role="group">
          <label for="event_time">Horário do Evento</label>
          <input type="time" name="event_time" id="event_time" />
        </div>
        <div role="group">
          <label for="event_location">Local do Evento</label>
          <input type="text" name="event_location" id="event_location" />
        </div>
        <div role="group">
          <button type="submit">Enviar</button>
          <button type="reset">Limpar</button>
          <a href="./events.php">Voltar</a>
        </div>
      </form>
    </section>
  </main>
<?php include('../components/footer.php'); ?>