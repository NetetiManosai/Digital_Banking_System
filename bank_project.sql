-- DATA BASE NAME: bank_project

CREATE TABLE managers(
    m_id INT AUTO_INCREMENT PRIMARY KEY,
    m_password VARCHAR(100) UNIQUE,
    manager_name VARCHAR(100),
    noc_added INT DEFAULT 0
);

ALTER TABLE managers AUTO_INCREMENT = 75000;

CREATE TABLE customers(
    c_id INT AUTO_INCREMENT PRIMARY KEY,
    c_password VARCHAR(100) UNIQUE,
    customer_name VARCHAR(100),
    c_balance INT DEFAULT 0,
    no_lockers INT DEFAULT 0
);

ALTER TABLE customers AUTO_INCREMENT = 92000;

INSERT INTO managers (manager_name, m_password) VALUES ('Rama', 'Rama@2005');

CREATE TABLE lockers(
    c_id INT,
    gold FLOAT(10,4),
    silver FLOAT(10,4),
    documents INT,
    cash INT,
    FOREIGN KEY (c_id) REFERENCES customers(c_id) ON DELETE CASCADE
);

ALTER TABLE customers DROP INDEX c_password;

ALTER TABLE managers ADD COLUMN profilepic LONGBLOB;
ALTER TABLE customers ADD COLUMN profilepic LONGBLOB;
