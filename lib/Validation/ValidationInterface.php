<?php

/**
 * Interface ValidationInterface
 */
interface ValidationInterface
{
    /**
     * @param $value
     * @param $options
     *
     * @return bool
     */
    public function validate($value, $options): bool;

    /**
     * @return string
     */
    public function getMessage(): string;
}