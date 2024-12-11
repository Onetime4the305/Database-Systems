const express = require('express');
const cors = require('cors');
const mysql = require('mysql');

const app = express();
const port = process.env.PORT || 5003;

app.use(cors());
app.use(express.json());

// Create a MySQL connection
const db = mysql.createConnection({
    host: 'localhost', // Change to your database host
    user: 'root', // Your MySQL username
    password: '', // Your MySQL password
    database: 'hospital_management', // The database name created from hospital-management.sql
    port: 3306
});

db.connect(err => {
    if (err) {
        console.error('Database connection failed:', err.stack);
        return;
    }
    console.log('Connected to database.');
});

// Define routes here

app.listen(port, () => {
    console.log(`Server is running on http://localhost:${port}`);
});

app.get('/api/patients', (req, res) => {
    db.query('SELECT * FROM patients', (err, results) => {
        if (err) {
            return res.status(500).json(err);
        }
        res.json(results);
    });
});

app.get('/api/Appointments', (req, res) => {
    db.query('SELECT * FROM Appointments', (err, results) => {
        if (err) {
            return res.status(500).json(err);
        }
        res.json(results);
    });
});


app.get('/api/Nurses', (req, res) => {
    db.query('SELECT * FROM Nurses', (err, results) => {
        if (err) {
            return res.status(500).json(err);
        }
        res.json(results);
    });
});

app.get('/api/Nurse', (req, res) => {
    db.query('SELECT * FROM Nurse', (err, results) => {
        if (err) {
            return res.status(500).json(err);
        }
        res.json(results);
    });
});

app.get('/api/Doctor', (req, res) => {
    db.query('SELECT * FROM Doctor', (err, results) => {
        if (err) {
            return res.status(500).json(err);
        }
        res.json(results);
    });
});

app.get('/api/MedicalProfessional', (req, res) => {
    db.query('SELECT * FROM MedicalProfessional', (err, results) => {
        if (err) {
            return res.status(500).json(err);
        }
        res.json(results);
    });
});



app.get('/api/Hospital', (req, res) => {
    db.query('SELECT * FROM Hospital', (err, results) => {
        if (err) {
            return res.status(500).json(err);
        }
        res.json(results);
    });
});




// Add more routes for doctors, nurses, appointments, etc.
