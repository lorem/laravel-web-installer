<?php

namespace Lorem\WebInstaller\Controllers;

use App\Http\Controllers\Controller;
use Lorem\WebInstaller\Helpers\FolderPermissionChecker;

class PermissionController extends Controller
{
    /**
     * @var FolderPermissionChecker
     */
    protected $folderPermissionChecker;

    /**
     * PermissionController constructor.
     *
     * @param FolderPermissionChecker $folderPermissionChecker
     */
    public function __construct(FolderPermissionChecker $folderPermissionChecker)
    {
        $this->folderPermissionChecker = $folderPermissionChecker;
    }

    public function checkPermissions()
    {
        $permissionResults = $this->folderPermissionChecker->check(
            config('installer.permissions')
        );

        return view('installer::permissions', compact('permissionResults'));
    }
}
