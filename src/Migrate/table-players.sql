CREATE TABLE IF NOT EXISTS Players (
    id      INT PRIMARY KEY, 
    position VARCHAR(255) NOT NULL,
    name    VARCHAR(255) NOT NULL,
    jersey  INT NOT NULL,
    value   VARCHAR(255)
);