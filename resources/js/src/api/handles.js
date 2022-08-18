import api from "./api";

export default {
    createSession() {
        return api.get('http://localhost:8000/sanctum/csrf-cookie');
    },

    login(params) {
        return api.post('/api/auth/login', params);
    },

    logout() {
        return api.delete('/api/auth/logout');
    },

    getParkings() {
        return api.get('/api/v1/parkings');
    },
};
