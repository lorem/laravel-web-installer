<?php

namespace Lorem\WebInstaller\Helpers;

use Illuminate\Validation\Rule;
use Validator;

class EnvironmentManager
{
    /**
     * @var string
     */
    private $envPath;
    /**
     * @var string
     */
    private $envExamplePath;

    /**
     * Set the env and env example paths.
     *
     * EnvironmentManager constructor.
     */
    public function __construct()
    {
        $this->envPath = base_path('.env');
        $this->envExamplePath = base_path('.env.example');
    }

    /**
     * Get the .env file path.
     *
     * @return string
     */
    public function getEnvPath()
    {
        return $this->envPath;
    }

    /**
     * Get the .env.example file path.
     *
     * @return string
     */
    public function getEnvExamplePath()
    {
        return $this->envExamplePath;
    }

    /**
     * Retrieve contents of .env file.
     *
     * @return string
     */
    public function getEnvContent()
    {
        if (! file_exists($this->envPath)) {
            $this->buildEnvFromExample();
        }

        return file_get_contents($this->envPath);
    }

    /**
     * Build the .env file from example.
     */
    private function buildEnvFromExample()
    {
        copy($this->envExamplePath, $this->envPath);
    }

    /**
     * Reset the env file back to blank.
     */
    public function wipeEnvContent()
    {
        file_put_contents($this->envPath, '');
    }

    /**
     * Saves the environment.
     *
     * @param $request
     */
    public function save($request)
    {
        $this->wipeEnvContent();

        file_put_contents($this->envPath, 'APP_KEY='.PHP_EOL, FILE_APPEND);

        collect($this->getRules())->map(function ($value, $key) use ($request) {
            return $key = $request[strtolower($key)];
        })->keyBy(function ($value, $key) {
            return strtoupper($key);
        })->map(function ($value, $key) {
            file_put_contents($this->envPath, $key.'='.$value.PHP_EOL, FILE_APPEND);
        });
    }

    /**
     * Return the validation rules.
     *
     * @return array
     */
    private function getRules()
    {
        return [
            'app_name' => 'required|string|max:50',
            'environment' => 'required|string|max:50',
            'app_debug' => [
                'required',
                Rule::in(['true', 'false']),
            ],
            'app_log_level' => 'required|string|max:50',
            'app_url' => 'required|url',
            'db_connection' => 'required|string|max:50',
            'db_host' => 'required|string|max:50',
            'db_port' => 'required|numeric',
            'db_database' => 'required|string|max:50',
            'db_username' => 'required|string|max:50',
            'db_password' => 'required|string|max:50',
            'broadcast_driver' => 'required|string|max:50',
            'cache_driver' => 'required|string|max:50',
            'session_driver' => 'required|string|max:50',
            'queue_driver' => 'required|string|max:50',
            'mail_driver' => 'required|string|max:50',
            'mail_host' => 'required|string|max:50',
            'mail_port' => 'required|string|max:50',
            'mail_username' => 'required|string|max:50',
            'mail_password' => 'required|string|max:50',
            'mail_encryption' => 'required|string|max:50',
            'pusher_app_id' => 'max:50',
            'pusher_app_key' => 'max:50',
            'pusher_app_secret' => 'max:50',
        ];
    }

    /**
     * Validate all fields are filled for env.
     *
     * @param $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function validateEnv($request)
    {
        return Validator::make($request, $this->getRules());
    }
}
