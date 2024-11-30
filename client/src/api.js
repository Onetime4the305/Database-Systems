import axios from 'axios';

const API_URL = 'http://localhost:5003'; // URL of your Node.js server

export const getPatients = async () => {
    const response = await axios.get(`${API_URL}/api/patients`);
    return response.data;
};



export const getMedicalProfessional = async () => {
    const response = await axios.get(`${API_URL}/api/MedicalProfessional`);
    return response.data;
};
