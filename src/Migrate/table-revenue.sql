CREATE TABLE IF NOT EXISTS Revenue (
    id          INT PRIMARY KEY,
    source      VARCHAR(255) NOT NULL, 
    amount      BIGINT NOT NULL,
    player_id   INT,
    FOREIGN KEY (player_id) REFERENCES Players(id)
);