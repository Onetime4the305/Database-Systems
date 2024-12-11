// Information.js
import React from 'react';
import Patients from './Patients'; // Your existing Patients component
import Doctor from './Doctors';


function Information() {
  return (
    <div>
      <h2>Information</h2>
      <Patients />
      {/* Add other components for doctors and appointments here */}
      <Doctor></Doctor>
    </div>
  );
}

export default Information;
