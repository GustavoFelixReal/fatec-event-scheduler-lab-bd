import { api } from './api.js';

export async function getEvents() {
  const params = new FormData();
  params.append('list_events', true)

  const events = await api.post('/', params)

  return events.data;
}