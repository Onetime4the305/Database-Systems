import React, { useEffect, useState } from 'react';
import { PieChart, Pie, Cell, Tooltip, Legend } from 'recharts';
import { getDiagnosisData } from '../api'; // Adjust path to your API file
import './DiagnosisPieChart.css'; // Import CSS for styling

const DiagnosisPieChart = () => {
    const [data, setData] = useState([]);

    const COLORS = ['#0088FE', '#00C49F', '#FFBB28', '#FF8042', '#AF19FF']; // Colors for the pie sections

    useEffect(() => {
        const fetchDiagnosisData = async () => {
            try {
                const diagnosisData = await getDiagnosisData();
                console.log("Fetched Diagnosis Data:", diagnosisData);
                // Format data for the chart
                const formattedData = diagnosisData.map((item) => ({
                    name: item.Diagnosis,
                    value: item.count,
                }));
                setData(formattedData);
            } catch (error) {
                console.error("Error fetching diagnosis data:", error);
            }
        };

        fetchDiagnosisData();
    }, []);

    return (
        <div className="chart-container">
            <h2>Patient Distribution by Diagnosis</h2>
            <PieChart width={800} height={400}>
                <Pie
                    data={data}
                    cx="50%"
                    cy="50%"
                    label={(entry) => `${entry.name}: ${entry.value}`} // Display name and value
                    outerRadius={150}
                    fill="#8884d8"
                    dataKey="value"
                >
                    {data.map((entry, index) => (
                        <Cell key={`cell-${index}`} fill={COLORS[index % COLORS.length]} />
                    ))}
                </Pie>
                <Tooltip />
                <Legend />
            </PieChart>
        </div>
    );
};

export default DiagnosisPieChart;
