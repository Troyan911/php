<?php

class Response
{
    private int $code;
    private string $contentType;

    /**
     * @param int $code
     * @param string $contentType
     */
    public function __construct(int $code, string $contentType)
    {
        $this->code = filter_var($code, FILTER_VALIDATE_INT);
        $this->contentType = filter_var($contentType, FILTER_DEFAULT);
    }

    /**
     * @return void
     */
    public function setHeaderAndCode(): void
    {
        http_response_code($this->code);
        header("Content-Type:" . $this->contentType);
    }

}