CREATE TABLE IF NOT EXISTS Accounts (
    id          INT PRIMARY KEY,
    role_id     INT NOT NULL,
    name        VARCHAR(255) NOT NULL,
    email       VARCHAR(255) NOT NULL,
    password    VARCHAR(255) NOT NULL,
    FOREIGN KEY (role_id) REFERENCES Roles(id) 
);