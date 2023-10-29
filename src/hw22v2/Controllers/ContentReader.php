<?php

trait ContentReader
{
    /**
     * @param string $fileName
     * @return string
     * @throws Exception
     */
    private function getData(string $fileName): string
    {
        $filePath = realpath(".") . "/files/$fileName";

        if (!file_exists($filePath)) {
            throw new Exception("File \"$filePath\" not found" . PHP_EOL);
        }
        return file_get_contents($filePath);
    }
}