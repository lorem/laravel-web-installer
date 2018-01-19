<?php

namespace Lorem\WebInstaller\Controllers;

use App\Http\Controllers\Controller;
use Lorem\WebInstaller\Helpers\DatabaseManager;

class DatabaseController extends Controller
{
    /**
     * @var DatabaseManager
     */
    private $databaseManager;

    /**
     * DatabaseController constructor.
     *
     * @param DatabaseManager $databaseManager
     */
    public function __construct(DatabaseManager $databaseManager)
    {
        $this->databaseManager = $databaseManager;
    }

    /**
     * Run the database migrations and seeder.
     */
    public function run()
    {
        $response = $this->databaseManager->migrateAndSeed();

        //Todo: Return a view and check for errors in the view
    }
}
