CREATE TABLE IF NOT EXISTS Teams (
    id       INT PRIMARY KEY,
    name     VARCHAR(255) NOT NULL,
    origin   CHAR(3) NOT NULL
);

-- 1 is Bayern itself
-- origin means nationality 3 letters defined in ISO 3166-1 alpha-3
-- ex : instead of UK its GBR and USA instead of US