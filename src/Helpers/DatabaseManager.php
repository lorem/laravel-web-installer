<?php

namespace Lorem\WebInstaller\Helpers;

use Exception;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class DatabaseManager
{
    /**
     * @var array
     */
    private $errors = [];

    /**
     * Migrate and seed the database.
     */
    public function migrateAndSeed()
    {
        $this->testDatabaseConnection();
        $this->migrate();
        $this->seed();
        if (count($this->errors) > 0)
        {
            return view('installer::environment')->with(['errors' => $this->errors]);
        }
    }

    /**
     * Test the database connection.
     */
    protected function testDatabaseConnection()
    {
        try {
            DB::connection()->getPdo();
        } catch (\Exception $e) {
            $this->addError($e);
        }
    }


    /**
     * Migrate the tables.
     */
    protected function migrate()
    {
        try {
            Artisan::call('migrate', ['--force' => true]);
        } catch (Exception $e) {
            $this->addError($e);
        }
    }

    /**
     * Seed the database.
     */
    protected function seed()
    {
        try {
            Artisan::call('db:seed');
        } catch (Exception $e) {
            $this->addError($e);
        }
    }

    /**
     * Add an error.
     *
     * @param $error
     */
    protected function addError($error)
    {
        $this->errors[] = $error;
    }
}
