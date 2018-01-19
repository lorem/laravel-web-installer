<?php

namespace Lorem\WebInstaller\Helpers;

use Exception;
use Illuminate\Support\Facades\Artisan;

class DatabaseManager
{
    /**
     * Migrate and seed the database.
     */
    public function migrateAndSeed()
    {
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
