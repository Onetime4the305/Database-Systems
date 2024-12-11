// src/components/Patients.js
import React, { useEffect, useState } from 'react';
import { getPatients } from '../api'; // Ensure the correct path to your api.js

const Patients = () => {
    const [patients, setPatients] = useState([]);

    useEffect(() => {
        const fetchPatients = async () => {
            try {
                const data = await getPatients();
                setPatients(data);
            } catch (error) {
                console.error("Error fetching patients:", error);
            }
        };

        fetchPatients();
    }, []);

    return (
        <div>
            <h1>Patients List</h1>
            <ul>
                {patients.length > 0 ? (
                    patients.map((patient) => (
                        <li key={patient.patient_id}>
                        {patient.FirstName} {patient.LastName} {/* Display full name */}
                    </li>
                    ))
                ) : (
                    <li>No patients found.</li>
                )}
            </ul>
        </div>
    );
};

export default Patients;
