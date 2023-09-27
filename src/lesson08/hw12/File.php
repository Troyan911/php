<?php
declare(strict_types=1);

class File
{
    private string $name;
    private string $path;

    /**
     * @param string $name
     * @throws Exception
     */
    public function __construct(string $name)
    {
        $path = __DIR__ . "/$name";

        if ($this->isExists($path)) {
            $this->name = $name;
            $this->path = $path;
        }
    }

    /**
     * @return generator
     */
    public function read(): generator
    {
        $file = fopen($this->path, 'r');
        while (($line = fgets($file)) !== false) {
            yield $line;
        }
        fclose($file);
    }

    /**
     * @param string $data
     * @return bool
     */
    public function write(string $data): bool
    {
        $file = fopen($this->path, "w");
        $var = fwrite($file, $data);
        fclose($file);
        return (bool)$var;
    }

    /**
     * @param string $path
     * @return bool
     * @throws Exception
     */
    private function isExists(string $path): bool
    {
        if (!file_exists($path)) {
            throw new Exception("File \"$path\" not found\n", 404);
        } else {
            return true;
        }
    }
}