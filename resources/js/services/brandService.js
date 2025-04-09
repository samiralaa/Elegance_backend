import axios from 'axios';

const API_URL = '/api/brands';

const brandService = {
    getAllBrands() {
        return axios.get(API_URL);
    },

    getBrandById(id) {
        return axios.get(`${API_URL}/${id}`);
    },

    createBrand(data) {
        return axios.post(API_URL, data);
    },

    updateBrand(id, data) {
        return axios.put(`${API_URL}/${id}`, data);
    },

    deleteBrand(id) {
        return axios.delete(`${API_URL}/${id}`);
    }
};

export default brandService; 