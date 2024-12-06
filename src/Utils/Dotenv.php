<?php

namespace App\Utils;

class Dotenv
{
    private string $path;

    public function __construct(string $path)
    {
        $this->path = $path;
    }

    public function load(): void
    {
        if (!file_exists($this->path)) {
            throw new \Exception("The .env file does not exist at {$this->path}");
        }

        $env = file($this->path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        foreach ($env as $line) {
            // Skip commented lines
            if (strpos(trim($line), '#') === 0) {
                continue;
            }

            // Split the line into key and value
            $parts = explode('=', $line, 2);
            if (count($parts) === 2) {
                $key = trim($parts[0]);
                $value = trim($parts[1]);

                // Remove optional surrounding quotes
                $value = preg_replace('/^["\'](.*)["\']$/', '$1', $value);

                // Set the environment variable
                putenv("$key=$value");
                $_ENV[$key] = $value;  // Optional: Set for global use
                $_SERVER[$key] = $value;  // Optional: Set for server use
            }
        }
    }
}
