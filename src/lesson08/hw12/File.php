<?php
declare(strict_types=1);

class File
{
    private string $name;
    private string $path;

    public function __construct(string $name)
    {
        $path = __DIR__ . "/$name";

        if($this->isExists($path)) {
            $this->name = $name;
            $this->path = $path;
        }
    }

    public function read(): ?generator
    {
        $file = fopen($this->path, 'r');
        while (($line = fgets($file)) !== false) {
            yield $line;
        }
        fclose($file);
    }

    public function write(string $data): bool
    {
        $file = fopen($this->path, "w");
        $var = fwrite($file, $data);
        fclose($file);
        return (bool) $var;
    }

    private function isExists(string $path): bool
    {
        if (!file_exists($path)) {
            throw new FileNotFoundException($path, 404);
        }
        else {
            return true;
        }
    }
}