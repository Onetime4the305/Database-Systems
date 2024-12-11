import React, { useEffect, useState } from 'react';
import { BarChart, Bar, XAxis, YAxis, CartesianGrid, Tooltip, Legend, Cell } from 'recharts';
import { getCounts } from '../api'; // Adjust the path to your api.js

const BarChartComponent = () => {
    const [data, setData] = useState([]);

    useEffect(() => {
        const fetchCounts = async () => {
            try {
                const counts = await getCounts();
                // Convert data into an array for the chart
                const chartData = [
                    { name: 'Doctors', count: counts.Doctors },
                    { name: 'Nurses', count: counts.Nurses },
                    { name: 'Patients', count: counts.Patients }
                ];
                setData(chartData);
            } catch (error) {
                console.error("Error fetching counts:", error);
            }
        };

        fetchCounts();
    }, []);

    // Define colors for each category
    const colors = ['#8884d8', '#82ca9d', '#ffc658'];

    return (
        <div>
            <h2>Number of Doctors, Nurses, and Patients</h2>
            <BarChart
                width={900}
                height={400}
                data={data}
                margin={{ top: 20, right: 30, left: 300, bottom: 5 }}
            >
                <CartesianGrid strokeDasharray="3 3" />
                <XAxis dataKey="name" />
                <YAxis />
                <Tooltip />
                <Legend />
                <Bar dataKey="count">
                    {data.map((entry, index) => (
                        <Cell key={`cell-${index}`} fill={colors[index]} />
                    ))}
                </Bar>
            </BarChart>
        </div>
    );
};

export default BarChartComponent;
