import React, { useEffect, useState } from 'react';
import { getMedicalProfessional } from '../api'; // Ensure the correct path to your api.js

const Doctor = () => {
    const [MedicalProfessional, setMedicalProfessional] = useState([]);

    useEffect(() => {
        const fetchMedicalProfessional = async () => {
            try {
                const data = await getMedicalProfessional();
                setMedicalProfessional(data);
            } catch (error) {
                console.error("Error fetching Medical Professionals:", error);
            }
        };

        fetchMedicalProfessional();
    }, []);

    return (
        <div>
            <h1>Medical Professional List</h1>
            <ul>
                {MedicalProfessional.length > 0 ? (
                    MedicalProfessional.map((professional) => (
                        <li key={professional.professional_id}>
                            {professional.FirstName} {professional.LastName} - {professional.Role}
                        </li>
                    ))
                ) : (
                    <li>No medical professionals found.</li>
                )}
            </ul>
        </div>
    );
};

export default Doctor;
