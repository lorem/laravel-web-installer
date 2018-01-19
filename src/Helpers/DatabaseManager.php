<?php

namespace Lorem\WebInstaller\Helpers;

use Exception;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class DatabaseManager
{
    /**
     * Migrate and seed the database.
     */
    public function migrateAndSeed()
    {
        try {
            DB::connection()->getPdo();
        } catch (\Exception $e) {
            die('Could not connect to the database.  Please check your configuration.');
        }

        $this->migrate();
        $this->seed();
    }

    /**
     * Migrate the tables.
     */
    protected function migrate()
    {
        try {
            Artisan::call('migrate', ['--force' => true]);
        } catch (Exception $e) {
            return $e;
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
            return $e;
        }
    }
}
