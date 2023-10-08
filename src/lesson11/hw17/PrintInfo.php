<?php

trait PrintInfo
{
    /**
     * @return void
     */
    public function print(): void
    {
        echo $this . PHP_EOL;
    }
}