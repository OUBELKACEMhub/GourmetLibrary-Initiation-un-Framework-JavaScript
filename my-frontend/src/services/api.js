import axios from 'axios';

const api = axios.create({
    baseURL: 'http://127.0.0.1:8000/api', // T-aked men l-port dyal Laravel
});

export default api;