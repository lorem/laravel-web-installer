<?php

namespace Lorem\WebInstaller\Helpers;

class InstallationFileManager
{
    /**
     * @var string
     */
    protected $filePath;

    /**
     * InstallationFileManager constructor.
     */
    public function __construct()
    {
        $this->filePath = storage_path('installation');
    }

    /**
     * Generate the installation file body.
     */
    public function generate()
    {
        $timestamp = date('Y-m-d h:i:s');

        $body = 'installed on: '.$timestamp."\n";

        $this->save($body);
    }

    /**
     * Check if the installation file already exists. If it does append the data otherwise create a default file.
     *
     * @param $body
     */
    public function save($body)
    {
        if (file_exists($this->filePath)) {
            file_put_contents($this->filePath, $body.PHP_EOL, FILE_APPEND | LOCK_EX);
        } else {
            file_put_contents($this->filePath, $body);
        }
    }
}
