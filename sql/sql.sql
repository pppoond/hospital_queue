CREATE TABLE department (
    dep_id INT(10) AUTO_INCREMENT NOT NULL,
    dep_name VARCHAR(25) NOT NULL,
    time_reg TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT dep_id_department_pk PRIMARY KEY (dep_id)
);
INSERT INTO department (dep_name)
VALUES ('ผู้ป่วยนอก (OPD)');
CREATE TABLE queue_table (
    q_id INT(10) AUTO_INCREMENT NOT NULL,
    dep_id INT(10) NOT NULL,
    q VARCHAR(10) NOT NULL,
    time_reg TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT q_id_queue_table_pk PRIMARY KEY (q_id),
    CONSTRAINT dep_id_department_fk FOREIGN KEY (dep_id) REFERENCES department(dep_id),
);