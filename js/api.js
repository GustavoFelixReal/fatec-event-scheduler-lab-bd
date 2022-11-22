import axios from "axios";

export const api = axios.create({
  baseURL: '../controller/EventController.php',
  headers: { 'Content-Type': 'multipart/form-data' },
})