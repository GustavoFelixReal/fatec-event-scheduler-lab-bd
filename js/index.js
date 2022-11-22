import { getEvents } from "./events.js";

;(async () => {
  const events = await getEvents();

  const table = document.querySelector('tbody');

  events.forEach(event => {
    const html = `
      <tr>
        <td>${event.event_id}</td>
        <td>${event.event_name}</td>
        <td>${event.event_date}</td>
      </tr>
    `;
    
    table.insertAdjacentHTML('beforeend', html);
  })
})();