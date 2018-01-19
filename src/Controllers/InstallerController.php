<?php

namespace Lorem\WebInstaller\Controllers;

use App\Http\Controllers\Controller;

class InstallerController extends Controller
{
    /**
     * Load the initial installer page.
     */
    public function index()
    {
        return view('installer::installer');
    }
}
