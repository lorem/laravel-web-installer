<?php

namespace Lorem\WebInstaller\Controllers;

use App\Http\Controllers\Controller;
use Lorem\WebInstaller\Helpers\ArtisanManager;
use Lorem\WebInstaller\Helpers\DatabaseManager;
use Lorem\WebInstaller\Helpers\InstallationFileManager;

class FinishController extends Controller
{
    /**
     * @var installationFileManager
     */
    protected $installationFileManager;

    /**
     * FinishController constructor.
     * @param InstallationFileManager $installationFileManager
     * @param ArtisanManager $artisanManager
     * @param DatabaseManager $databaseManager
     */
    public function __construct(InstallationFileManager $installationFileManager, ArtisanManager $artisanManager, DatabaseManager $databaseManager)
    {
        $this->installationFileManager = $installationFileManager;
        $this->artisanManager = $artisanManager;
        $this->databaseManager = $databaseManager;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function end()
    {
        $this->installationFileManager->generate();

        $this->artisanManager->run();

        $this->databaseManager->migrateAndSeed();

        return view('installer::finish');
    }
}
