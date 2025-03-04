--user
CREATE TABLE users (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    email_verified_at TIMESTAMP NULL DEFAULT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'doctor', 'patient') NOT NULL DEFAULT 'patient',
    remember_token VARCHAR(100) NULL DEFAULT NULL,
    created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

--insert 

INSERT INTO users (name, email, email_verified_at, password, role, remember_token, created_at, updated_at) 
VALUES 
('John Doe', 'johndoe@example.com', NULL, 'hashed_password', 'admin', NULL, NOW(), NOW()), 
('Dr. Smith', 'drsmith@example.com', NULL, 'hashed_password', 'doctor', NULL, NOW(), NOW()), 
('Alice Patient', 'alice@example.com', NULL, 'hashed_password', 'patient', NULL, NOW(), NOW());

//Delete all user 

DELETE FROM users WHERE email = 'johndoe@example.com';


//Delete all user user with role patient

DELETE FROM users WHERE role = 'patient';


//Delete all from user 

DELETE FROM users;


//show all user 

SELECT * FROM users;


//show only admins 

SELECT * FROM users WHERE role = 'admin';


//show user with a specific email 

SELECT * FROM users WHERE email = 'johndoe@example.com';


//update user role 

UPDATE users SET role = 'doctor', updated_at = NOW() WHERE email = 'alice@example.com';


//update user password 

UPDATE users SET password = 'new_hashed_password', updated_at = NOW() WHERE email = 'johndoe@example.com';


///Doctor Exparts

CREATE TABLE doctor_exparts (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NULL,
    description TEXT NULL,
    deleted_at TIMESTAMP NULL DEFAULT NULL,
    created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

//Insert

INSERT INTO doctor_exparts (name, description) 
VALUES 
('Cardiology', 'Heart-related specialist'), 
('Neurology', 'Brain and nervous system specialist');

//Delete

DELETE FROM doctor_exparts WHERE name = 'Cardiology'; -- Delete a specific expert
DELETE FROM doctor_exparts; -- Delete all experts

//View

SELECT * FROM doctor_exparts; -- Show all experts
SELECT * FROM doctor_exparts WHERE name = 'Neurology'; -- Show a specific expert





///Doctor profile

CREATE TABLE doctors (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT UNSIGNED UNIQUE,
    profile_picture VARCHAR(255) NULL,
    gender ENUM('male', 'female', 'other'),
    dob DATE,
    blood_group VARCHAR(10) NULL,
    nationality VARCHAR(255) NULL,
    specialization_id BIGINT UNSIGNED NULL,
    medical_reg_no VARCHAR(255) NOT NULL,
    qualification ENUM('MBBS', 'MD', 'DO', 'DM', 'MS', 'PhD', 'Diplomas & Fellowships'),
    experience INT NOT NULL,
    myself TEXT NULL,
    created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (specialization_id) REFERENCES specializations(id)
);

//Insert

INSERT INTO doctors (user_id, profile_picture, gender, dob, blood_group, nationality, specialization_id, medical_reg_no, qualification, experience, myself) 
VALUES 
(1, 'profile1.jpg', 'male', '1980-05-15', 'O+', 'American', 1, '123456', 'MD', 10, 'Experienced Cardiologist');

//Delete

DELETE FROM doctors WHERE user_id = 1; -- Delete a specific doctor
DELETE FROM doctors; -- Delete all doctors

//View

SELECT * FROM doctors; -- Show all doctors
SELECT * FROM doctors WHERE gender = 'male'; -- Show male doctors
SELECT * FROM doctors WHERE specialization_id = 1; -- Show doctors by specialization


///appointments

CREATE TABLE appointments (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    patient_id BIGINT UNSIGNED,
    doctor_id BIGINT UNSIGNED,
    appointment_date DATE NOT NULL,
    time_slot VARCHAR(255) NOT NULL,
    status ENUM('pending', 'confirmed', 'completed', 'cancelled') DEFAULT 'pending',
    created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (patient_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (doctor_id) REFERENCES users(id) ON DELETE CASCADE
);

//Insert

INSERT INTO appointments (patient_id, doctor_id, appointment_date, time_slot, status) 
VALUES 
(2, 1, '2025-03-10', '10:00 AM - 11:00 AM', 'confirmed');

//Delete

DELETE FROM appointments WHERE id = 1; -- Delete a specific appointment
DELETE FROM appointments WHERE status = 'cancelled'; -- Delete all cancelled appointments
DELETE FROM appointments; -- Delete all appointments

//View

SELECT * FROM appointments; -- Show all appointments
SELECT * FROM appointments WHERE status = 'confirmed'; -- Show confirmed appointments
SELECT * FROM appointments WHERE doctor_id = 1; -- Show appointments of a specific doctor


///patient

CREATE TABLE patients (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT UNSIGNED UNIQUE,
    profile_picture VARCHAR(255) NULL,
    gender ENUM('male', 'female', 'other'),
    dob DATE NOT NULL,
    blood_group VARCHAR(10) NULL,
    nationality VARCHAR(255) NULL,
    myself TEXT NULL,
    created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

//insert

INSERT INTO patients (user_id, profile_picture, gender, dob, blood_group, nationality, myself) 
VALUES 
(2, 'patient1.jpg', 'female', '1995-07-20', 'A+', 'Canadian', 'Health-conscious individual');

//delete 

DELETE FROM patients WHERE user_id = 2; -- Delete a specific patient
DELETE FROM patients; -- Delete all patients


//view 

SELECT * FROM patients; -- Show all patients
SELECT * FROM patients WHERE gender = 'female'; -- Show female patients


///Test

CREATE TABLE tests (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    test_name VARCHAR(255) NULL,
    price INT NULL,
    description TEXT NULL,
    created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

//insert 

INSERT INTO tests (test_name, price, description) 
VALUES 
('Blood Test', 500, 'Basic blood analysis'), 
('MRI Scan', 3000, 'Detailed brain scan');

//delete 

DELETE FROM tests WHERE test_name = 'Blood Test'; -- Delete a specific test
DELETE FROM tests; -- Delete all tests

//view 

SELECT * FROM tests; -- Show all tests
SELECT * FROM tests WHERE price > 1000; -- Show expensive tests


///Report

CREATE TABLE reports (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    patient_name VARCHAR(255) NOT NULL,
    gender ENUM('Male', 'Female', 'Other') NOT NULL,
    dob DATE NOT NULL,
    blood_group VARCHAR(10) NOT NULL,
    doctor_id INT UNSIGNED NOT NULL,
    test_id INT UNSIGNED NOT NULL,
    test_date DATE NOT NULL,
    status ENUM('Pending', 'Completed', 'Canceled') NOT NULL DEFAULT 'Pending',
    created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (doctor_id) REFERENCES doctors(id) ON DELETE CASCADE,
    FOREIGN KEY (test_id) REFERENCES tests(id) ON DELETE CASCADE
);

// insert 

INSERT INTO reports (patient_name, gender, dob, blood_group, doctor_id, test_id, test_date, status) 
VALUES 
('Alice Doe', 'Female', '1995-07-20', 'A+', 1, 1, '2025-03-01', 'Pending');


//delete 

DELETE FROM reports WHERE id = 1; -- Delete a specific report
DELETE FROM reports WHERE status = 'Canceled'; -- Delete all canceled reports
DELETE FROM reports; -- Delete all reports


//view 

SELECT * FROM reports; -- Show all reports
SELECT * FROM reports WHERE status = 'Completed'; -- Show completed reports
SELECT * FROM reports WHERE doctor_id = 1; -- Show reports handled by a specific doctor


-- sub query 
-- Get Patients Who Have Appointments with a Specific Doctor
SELECT name 
FROM users 
WHERE id IN (
    SELECT patient_id 
    FROM appointments 
    WHERE doctor_id = (SELECT id FROM users WHERE name = 'Dr. Smith')
);



