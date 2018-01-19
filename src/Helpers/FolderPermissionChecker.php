<?php

namespace Lorem\WebInstaller\Helpers;

class FolderPermissionChecker
{
    /**
     * @var array
     */
    protected $results = [];

    /**
     * Get the permissions of a directory.
     *
     * @param $directory
     *
     * @return bool|int
     */
    public function getPermission($directory)
    {
        return substr(decoct(fileperms(base_path($directory))), 2);
    }

    /**
     * Check each directory for valid permission.
     *
     * @param array $directories
     * @return \Illuminate\Support\Collection
     */
    public function check(array $directories)
    {
        foreach ($directories as $directory => $permission) {
            if (! ($this->getPermission($directory) >= $permission)) {
                $this->addResult($directory, $permission, true);
            } else {
                $this->addResult($directory, $permission);
            }
        }

        return collect($this->results);
    }

    /**
     * Add the result to the results array.
     *
     * @param $folder
     * @param $requiredPermission
     * @param bool $error
     */
    public function addResult($folder, $requiredPermission, $error = false)
    {
        $this->results[] = [
            'folder' => $folder,
            'permission' => $requiredPermission,
            'error' => $error,
        ];
    }
}
