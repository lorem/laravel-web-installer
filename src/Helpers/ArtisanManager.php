<?php

namespace Lorem\WebInstaller\Helpers;

use Exception;
use Illuminate\Support\Facades\Artisan;
use Symfony\Component\Console\Output\BufferedOutput;

class ArtisanManager
{
    /**
     * @return mixed
     */
    public function run()
    {
        $outputLog = new BufferedOutput();

        $this->generateKey($outputLog);

        return $outputLog->fetch();
    }

    /**
     * Generate a (new) application key.
     *
     * @param $outputLog
     * @return mixed
     */
    private static function generateKey($outputLog)
    {
        try {
            Artisan::call('key:generate', ["--force" => true], $outputLog);
        } catch (Exception $e) {
            return $e->getMessage();
        }

        return $outputLog;
    }
}
