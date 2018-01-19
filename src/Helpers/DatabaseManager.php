<?php

namespace Lorem\WebInstaller\Helpers;

use Exception;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Lorem\WebInstaller\Traits\HandlesErrors;

class DatabaseManager
{
    use HandlesErrors;

    /**
     * Migrate and seed the database.
     */
    public function migrateAndSeed()
    {
        $this->testDatabaseConnection();
        $this->migrate();
        $this->seed();
        if ($this->hasErrors())
        {
            return view('installer::environment')->with(['errors' => $this->getErrors()]);
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
}
