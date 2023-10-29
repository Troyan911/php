<?php

class Response
{
    private array $contentTypes = [
        "application/json",
        "application/xml",
        "text/html"
    ];

    private array $statusCodes = [200, 201, 300, 301, 302, 303, 400, 401, 402, 403, 404, 405, 500, 501, 502, 503, 504, 505];
    private string $data;

    /**
     * @param int $statusCode
     * @param string $contentType
     */
    public function __construct(int $statusCode, string $contentType, string $data = null)
    {
        try {
            $this->setStatusCode($statusCode);
            $this->setContentType($contentType);
            isset($data) ? $this->setData($data) : null;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * @param int $statusCode
     * @return void
     * @throws Exception
     */
    private function setStatusCode(int $statusCode): void
    {
        if (!in_array($statusCode, $this->statusCodes)) {
            throw new Exception("Please set to param statusCode one from next values: \n"
                . implode("\n", $this->statusCodes) . PHP_EOL);
        }
        http_response_code($statusCode);
    }

    /**
     * @param string $contentType
     * @return void
     * @throws Exception
     */
    private function setContentType(string $contentType): void
    {
        if (!in_array($contentType, $this->contentTypes)) {
            throw new Exception("Please set contentType param from one of next values:\n"
                . implode("\n", $this->contentTypes) . PHP_EOL);
        }
        header("Content-Type: $contentType; charset=utf-8");
    }

    /**
     * @param string $data
     * @return void
     */
    private function setData(string $data): void
    {
        $this->data = $data;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->data ?? "";
    }
}