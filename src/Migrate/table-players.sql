CREATE TABLE IF NOT EXISTS Players (
    id      INT PRIMARY KEY, 
    position VARCHAR(255) NOT NULL,
    name    VARCHAR(255) NOT NULL,
    jersey  INT NOT NULL,
    value   BIGINT NOT NULL,
    team_id INT NOT NULL,
    is_foreign BOOLEAN DEFAULT TRUE,
    FOREIGN KEY (team_id) REFERENCES Teams(id)
);