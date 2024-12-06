import React, { useState } from 'react';
import axios from 'axios'; // Import axios

const AddPatientForm = () => {
    const [patientData, setPatientData] = useState({
        FirstName: '',
        LastName: '',
        dob: '',
        ssn: '',
        Diagnosis: '',
        phone: '',
    });

    const handleChange = (e) => {
        const { name, value } = e.target;
        setPatientData((prevData) => ({
            ...prevData,
            [name]: value,
        }));
    };

    const handleSubmit = async (e) => {
        e.preventDefault();

        try {
            const response = await axios.post('http://localhost:5003/api/add-patient', patientData);
            if (response.status === 201) {
                alert('Patient added successfully!');
                setPatientData({
                    FirstName: '',
                    LastName: '',
                    dob: '',
                    ssn: '',
                    Diagnosis: '',
                    phone: '',
                });
            }
        } catch (error) {
            console.error('Error adding patient:', error);
            alert('Error adding patient');
        }
    };

    return (
        <form onSubmit={handleSubmit}>
            <div>
                <label>First Name:</label>
                <input
                    type="text"
                    name="FirstName"
                    value={patientData.FirstName}
                    onChange={handleChange}
                    required
                />
            </div>
            <div>
                <label>Last Name:</label>
                <input
                    type="text"
                    name="LastName"
                    value={patientData.LastName}
                    onChange={handleChange}
                    required
                />
            </div>
            <div>
                <label>Date of Birth:</label>
                <input
                    type="date"
                    name="dob"
                    value={patientData.dob}
                    onChange={handleChange}
                    required
                />
            </div>
            <div>
                <label>SSN:</label>
                <input
                    type="text"
                    name="ssn"
                    value={patientData.ssn}
                    onChange={handleChange}
                    required
                />
            </div>
            <div>
                <label>Diagnosis:</label>
                <input
                    type="text"
                    name="Diagnosis"
                    value={patientData.Diagnosis}
                    onChange={handleChange}
                    required
                />
            </div>
            <div>
                <label>Phone:</label>
                <input
                    type="text"
                    name="phone"
                    value={patientData.phone}
                    onChange={handleChange}
                    required
                />
            </div>
            <div>
                <button type="submit">Add Patient</button>
            </div>
        </form>
    );
};

export default AddPatientForm;
