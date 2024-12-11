// src/components/InfoTab.js
import React from 'react';
import AddPatientForm from './AddPatientForm';

const AddInfo = () => {
    return (
        <div>
            <h2>Add Info</h2>
            {/* AddPatientForm is being rendered here */}
            <AddPatientForm />
        </div>
    );
};

export default AddInfo;
