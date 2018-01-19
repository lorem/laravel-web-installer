<?php

namespace Lorem\WebInstaller\Traits;

trait HandlesErrors
{
    /**
     * @var array
     */
    private $errors = [];

    /**
     * Add an error.
     *
     * @param $error
     */
    protected function addError($error)
    {
        $this->errors[] = $error;
    }

    /**
     * Determine whether any errors exist.
     *
     * @return bool
     */
    protected function hasErrors()
    {
        return count($this->errors) > 0;
    }

    /**
     * Returns the error array.
     *
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }
}
