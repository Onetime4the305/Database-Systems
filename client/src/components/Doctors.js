// src/components/Patients.js
import React, { useEffect, useState } from 'react';
import { getMedicalProfessional } from '../api'; // Ensure the correct path to your api.js

const Doctor = () => {
    const [doctor, setDoctor] = useState([]);

    useEffect(() => {
        const fetchDoctor = async () => {
            try {
                const data = await getMedicalProfessional();
                setDoctor(data);
            } catch (error) {
                console.error("Error fetching Doctor:", error);
            }
        };

        fetchDoctor();
    }, []);

    return (
        <div>
            <h1>Medical Professional List</h1>
            <ul>
                {doctor.length > 0 ? (
                    doctor.map((doctor) => (
                        <li key={doctor.doctor_id}>
                        {doctor.FirstName} {doctor.LastName} {/* Display full name */}
                    </li>
                    ))
                ) : (
                    <li>No doctors found.</li>
                )}
            </ul>
        </div>
    );
};

export default Doctor;
