import { initEvents } from "./events.js";

;(async () => {
  const events = initEvents();

  const table = document.querySelector('tbody');

  events.data.forEach(event => {
    document.createElement('td')
    
  })

})();