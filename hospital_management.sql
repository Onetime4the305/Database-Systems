
-- Create tables
CREATE TABLE IF NOT EXISTS MedicalProfessional (
    professional_id INT AUTO_INCREMENT PRIMARY KEY,
    FirstName VARCHAR(100) NOT NULL,
    LastName VARCHAR(100) NOT NULL,
    Role ENUM('Doctor', 'Nurse') NOT NULL
);

CREATE TABLE IF NOT EXISTS Doctor (
    doctor_id INT AUTO_INCREMENT PRIMARY KEY,
    professional_id INT,
    Department VARCHAR(100),
    FOREIGN KEY (professional_id) REFERENCES MedicalProfessional(professional_id)
);

CREATE TABLE IF NOT EXISTS Nurse (
    nurse_id INT AUTO_INCREMENT PRIMARY KEY,
    professional_id INT,
    nurse_grade VARCHAR(50),
    FOREIGN KEY (professional_id) REFERENCES MedicalProfessional(professional_id)
);

CREATE TABLE IF NOT EXISTS patients (
    patient_id INT AUTO_INCREMENT PRIMARY KEY,
    FirstName VARCHAR(100) NOT NULL,
    LastName VARCHAR(100) NOT NULL,
    dob DATE,
    ssn VARCHAR(11),
    Diagnosis VARCHAR(100),
    phone VARCHAR(15)
);

CREATE TABLE IF NOT EXISTS Hospital (
    HospitalID INT AUTO_INCREMENT PRIMARY KEY,
    HospitalName VARCHAR(100) NOT NULL,
    Address VARCHAR(255) NOT NULL,
    NumberOfEmployees INT NOT NULL
);

CREATE TABLE IF NOT EXISTS Appointments (
    AppointmentID INT AUTO_INCREMENT PRIMARY KEY,
    PatientID INT NOT NULL,
    DoctorID INT NOT NULL,
    AppointmentDate DATETIME NOT NULL
);

-- Insert data into MedicalProfessional
INSERT INTO MedicalProfessional (FirstName, LastName, Role) VALUES
('John', 'Micheal', 'Doctor'),
('Alice', 'Green', 'Doctor'),
('Bob', 'Taylor', 'Doctor'),
('Charlie', 'White', 'Doctor'),
('Diana', 'Smith', 'Doctor'),
('Jane', 'Michael', 'Nurse'),
('Natalie', 'Johnson', 'Nurse');

-- Insert data into Doctor table
INSERT INTO Doctor (professional_id, Department) VALUES
(1, 'General Practice'),  -- John Micheal
(2, 'Pediatrics'),        -- Alice Green
(3, 'Cardiology'),        -- Bob Taylor
(4, 'Dermatology'),       -- Charlie White
(5, 'Oncology');          -- Diana Smith

-- Insert data into Nurse table
INSERT INTO Nurse (professional_id, nurse_grade) VALUES
(6, 'Registered Nurse'),     -- Jane Michael
(7, 'Licensed Practical Nurse');  -- Natalie Johnson


-- Insert data into hospital table
INSERT INTO Hospital (HospitalName, Address, NumberOfEmployees) VALUES
('City Hospital', '123 Main St, Springfield', 150),
('Health Center', '456 Elm St, Springfield', 75),
('Community Clinic', '789 Oak St, Springfield', 30);


-- Insert data into patiens table
INSERT INTO patients (FirstName, LastName, dob, ssn, Diagnosis, phone) VALUES
('John', 'Doe', '1985-06-15', '123-45-6789', 'Flu', '555-123-4567'),
('Jane', 'Smith', '1990-03-22', '987-65-4321', 'Cold', '555-987-6543'),
('Emily', 'Johnson', '1975-11-30', '456-78-9123', 'Allergy', '555-654-3210'),
('Michael', 'Brown', '2000-01-15', '321-54-6789', 'Asthma', '555-321-0987');



SELECT * FROM Hospital;
SELECT * FROM Nurse;
SELECT * FROM Doctor;
SELECT * FROM Appointments;
SELECT * FROM MedicalProfessional;
SELECT * FROM patients;
