<?php

namespace Lorem\WebInstaller\Traits;

trait Installable
{
    /**
     * Check if the installer has already been run by existence of the installation file.
     *
     * @return bool
     */
    public function isInstalled()
    {
        return file_exists(storage_path('installation'));
    }
}
