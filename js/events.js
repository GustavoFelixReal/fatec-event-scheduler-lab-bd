import { api } from './api.js';

export async function initEvents() {
  const events = await api.post('/', {
    list_events: true,
  })

  return events.data;
}