CREATE TABLE IF NOT EXISTS Players (
    id      INT PRIMARY KEY, 
    position VARCHAR(255) NOT NULL,
    name    VARCHAR(255) NOT NULL,
    jersey  INT NOT NULL,
    value   BIGINT NOT NULL,
    club_id INT NOT NULL,
    is_foreign BOOLEAN DEFAULT TRUE,
    FOREIGN KEY (club_id) REFERENCES Clubs(id)
);