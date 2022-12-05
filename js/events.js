import { api } from "./api.js";
import { DateTime } from "luxon";

export async function getEvents() {
  const params = new FormData();
  params.append("list_events", true);

  const events = await api.post("/", params);

  return events.data;
}

export async function getEventsOnPeriod() {
  const params = new FormData();

  const startDate = DateTime.now();

  params.append("report_event", true);
  params.append("event_start_date", startDate.toSQLDate());
  params.append("event_end_date", startDate.plus({ months: 1 }).toSQLDate());

  const events = await api.post("/", params);

  return events.data;
}

export async function getEventById(id) {
  const params = new FormData();
  params.append("get_event", id);

  const event = await api.post("/", params);

  return event.data;
}

export async function initEvents() {
  const table = document.querySelector("tbody");

  if (table) {
    const events = await getEvents();

    events.forEach((event) => {
      const html = `
      <tr>
        <td>${event.event_id}</td>
        <td>
          <a href="../pages/view-event.php?id=${event.event_id}">${
        event.event_name
      }</a>
        </td>
        <td>${DateTime.fromSQL(event.event_date).toLocaleString('pt-BR')}</td>
        <td>
          <a href="../pages/edit-event.php?id=${
            event.event_id
          }" class="btn btn-sm btn-info" title="Editar evento">Editar</a>
          <a href="../pages/delete-event.php?id=${
            event.event_id
          }" class="btn btn-sm btn-danger" title="Excluir evento">Excluir</a>
        </td>
      </tr>
    `;

      table.insertAdjacentHTML("beforeend", html);
    });
  }
}

export async function initReportsEvents() {
  const table = document.querySelector("tbody");

  if (table) {
    const events = await getEventsOnPeriod();

    events.forEach((event) => {
      const html = `
      <tr>
        <td>${event.event_id}</td>
        <td>
          <a href="../pages/view-event.php?id=${event.event_id}">${
        event.event_name
      }</a>
        </td>
        <td>${DateTime.fromSQL(event.event_date).toLocaleString('pt-BR')}</td>
        <td>
          <a href="../pages/edit-event.php?id=${
            event.event_id
          }" class="btn btn-sm btn-info" title="Editar evento">Editar</a>
          <a href="../pages/delete-event.php?id=${
            event.event_id
          }" class="btn btn-sm btn-danger" title="Excluir evento">Excluir</a>
        </td>
      </tr>
    `;

      table.insertAdjacentHTML("beforeend", html);
    });
  }
}

export async function initEvent(id) {
  const event = await getEventById(id);

  Object.keys(event).forEach((key) => {
    const element = document.querySelector(`#${key}`);
    element.setAttribute("value", event[key]);
  });
}

export async function initDeleteEvent(id) {
  const input = document.querySelector("#delete_event");

  if (input) {
    input.setAttribute("value", id);
  }
}

export async function initViewEvent(id) {
  let event = await getEventById(id);

  event = {
    ...event,
    event_date: new Date(event.event_date).toLocaleDateString("pt-BR"),
  };

  Object.keys(event).forEach((key) => {
    const element = document.querySelector(`#${key}`);
    element.innerHTML = event[key];
  });

  const deleteEventButton = document.querySelector("#delete_event");
  const editEventButton = document.querySelector("#edit_event");
  deleteEventButton.setAttribute(
    "href",
    `../pages/delete-event.php?id=${event.event_id}`
  );
  editEventButton.setAttribute(
    "href",
    `../pages/edit-event.php?id=${event.event_id}`
  );
}
