
CREATE TABLE drivers (
     id INT AUTO_INCREMENT PRIMARY KEY,
     name VARCHAR(255) NOT NULL,
     number VARCHAR(15) NOT NULL,
     address TEXT NULL,
     created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
     updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
 );

CREATE TABLE customers (
     id INT AUTO_INCREMENT PRIMARY KEY,
     name VARCHAR(255) NOT NULL,
     number VARCHAR(15) NOT NULL,
     company_name VARCHAR(255) NULL,
     address TEXT NULL,
     created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
     updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
 );

CREATE TABLE trips (
     id INT AUTO_INCREMENT PRIMARY KEY,
     customer_id INT NOT NULL,
     driver_id INT NULL,
     vehicle_id INT NULL,
     from_city VARCHAR(255) NOT NULL,
     to_city VARCHAR(255) NOT NULL,
     material VARCHAR(255) NOT NULL,
     weight VARCHAR(50) NOT NULL,
     requested BOOLEAN DEFAULT FALSE,
     accepted BOOLEAN DEFAULT FALSE,
     created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
     updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
     FOREIGN KEY (customer_id) REFERENCES customers(id),
     FOREIGN KEY (driver_id) REFERENCES drivers(id),
     FOREIGN KEY (vehicle_id) REFERENCES vehicles(id)
);


CREATE TABLE admins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);

INSERT INTO admins (name, email, password) VALUES ('admin', 'viewvivek93@gmail.com', '$2y$12$6sj/iwYQ3dfl4iW5PXTDme6NA2ky.brJoCQ82u9IMNHnR0iwHZ1cG');

ALTER TABLE drivers ADD driving_license_path VARCHAR(255) NOT NULL;
ALTER TABLE customers ADD gst_number VARCHAR(255) NOT NULL;
ALTER TABLE customers ADD approved BOOLEAN DEFAULT FALSE;

CREATE TABLE `vehicles` (
    `id` INT(11) AUTO_INCREMENT PRIMARY KEY,
    `vehicle_name` VARCHAR(255) NOT NULL,
    `registration_number` VARCHAR(100) NOT NULL UNIQUE,
    `rc_expiry_date` DATE NOT NULL,
    `rc_attachment` VARCHAR(255) NULL,
    `insurance_expiry_date` DATE NOT NULL,
    `insurance_attachment` VARCHAR(255) NULL,
    `pollution_certificate_expiry_date` DATE NOT NULL,
    `pollution_attachment` VARCHAR(255) NULL,
    `created_at` DATETIME NULL,
    `updated_at` DATETIME NULL
);

CREATE TABLE trip_advances (
    id INT AUTO_INCREMENT PRIMARY KEY,
    trip_id INT NOT NULL,
    driver_id INT NOT NULL,
    amount DECIMAL(10,2) NOT NULL DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (trip_id) REFERENCES trips(id) ON DELETE CASCADE
);

CREATE TABLE trip_expenses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    trip_id INT NOT NULL UNIQUE, -- Ensures only one expense per trip
    driver_id INT NOT NULL,
    bata DECIMAL(10,2) DEFAULT 0,
    vehicle_maintenance DECIMAL(10,2) DEFAULT 0,
    police_fine DECIMAL(10,2) DEFAULT 0,
    other_expense DECIMAL(10,2) DEFAULT 0,
    advance DECIMAL(10,2) DEFAULT 0,
    total DECIMAL(10,2) DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (trip_id) REFERENCES trips(id) ON DELETE CASCADE,
    FOREIGN KEY (driver_id) REFERENCES drivers(id) ON DELETE CASCADE
);


