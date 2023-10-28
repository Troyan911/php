<?php

class Response
{
    private string $contentType;

    private array $contentTypes = [
        "application/json",
        "application/xml",
        "text/html"
    ];

    private array $statusCodes = [200, 201, 300, 301, 302, 303, 400, 401, 402, 403, 404, 500, 501, 502, 503, 504];
    private string $data;

    /**
     * At first try to set statusCode
     * Then content type
     * And finally, when code = 200 and content type matched, try to get data
     */
    public function __construct()
    {
        try {
            $this->setStatusCode();
            $this->setContentType();

            if (http_response_code() === 200) {
                $this->setData();
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * @return void
     * @throws Exception
     */
    private function setStatusCode(): void
    {
        $statusCode = $_GET['statusCode'] ?? null;
        if (!isset($statusCode) || !in_array($statusCode, $this->statusCodes)) {
            throw new Exception("Please set to param statusCode one from next values: \n"
                . implode("\n", $this->statusCodes) . PHP_EOL);
        }

        http_response_code($statusCode);
    }

    /**
     * @return void
     * @throws Exception
     */
    private function setContentType(): void
    {
        if (!isset($_GET['contentType']) || !in_array($_GET['contentType'], $this->contentTypes)) {
            throw new Exception("Please set contentType param from one of next values:\n"
                . implode("\n", $this->contentTypes) . PHP_EOL);
        }
        $this->contentType = $_GET['contentType'];
        header("Content-Type: $this->contentType; charset=utf-8");
    }

    /**
     * @return void
     * @throws Exception
     */
    private function setData(): void
    {
        switch ($this->contentType) {
            case "application/json" :
                $fileName = "test.json";
                break;
            case "application/xml" :
                $fileName = "test.xml";
                break;
            case "text/html" :
                $fileName = "test.html";
                break;
            default:
                $fileName = "unknown.file";
        }

        if (!file_exists($fileName)) {
            throw new Exception("File with content type \"$this->contentType\" not found" . PHP_EOL);
        }
        $this->data = file_get_contents($fileName);
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->data ?? "";
    }
}