// src/components/InfoTab.js
import React from 'react';
import BarChartComponent from './chart.js';
import DiagnosisPieChart from './pie.js';

const Dashboard = () => {
    return (
        <div>
            <h2>Dashboard Chart</h2>
            {/* BarChartComponent is being rendered here */}
            <BarChartComponent />
            <DiagnosisPieChart/>
        </div>
    );
};

export default Dashboard;
