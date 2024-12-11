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


// get counts for the bar chart:
export const getCounts = async () => {
    const response = await axios.get(`${API_URL}/api/counts`);
    return response.data;
};


// get table for pie chart

export const getDiagnosisData = async () => {
    const response = await axios.get(`${API_URL}/api/diagnosis-pie`);
    return response.data;
};


// Function to add a new patient
export const addPatient = async (patientData) => {
    const response = await axios.post(`${API_URL}/api/add-patient`, patientData);
    return response.data;
};

// Function to add a new doctor
export const addDoctor = async (doctorData) => {
    const response = await axios.post(`${API_URL}/api/add-doctor`, doctorData);
    return response.data;
};

// Function to add a new nurse
export const addNurse = async (nurseData) => {
    const response = await axios.post(`${API_URL}/api/add-nurse`, nurseData);
    return response.data;
};

