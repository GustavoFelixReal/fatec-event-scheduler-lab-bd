import { initDeleteEvent, initEvent, initEvents, initReportsEvents, initViewEvent } from "./events.js";
import "../styles/global.css";

(async () => {
  let path = window.location.pathname.split(
    "/fatec-event-scheduler-lab-bd/pages/"
  )[1];

  switch (path) {
    case "home.php": {
      await initReportsEvents();
      break;
    }
    case "events.php": {
      await initEvents();
      break;
    }
    case "edit-event.php": {
      const [_trash, params] = window.location.search?.split("?");
      const [_paramName, value] = params?.split("=");

      await initEvent(value);
      break;
    }
    case "delete-event.php": {
      const [_trash, params] = window.location.search?.split("?");
      const [_paramName, value] = params?.split("=");

      await initDeleteEvent(value);
      break;
    }
    case "view-event.php": {
      const [_trash, params] = window.location.search?.split("?");
      const [_paramName, value] = params?.split("=");

      await initViewEvent(value);
      break;
    }
    default: {
    }
  }
})();
