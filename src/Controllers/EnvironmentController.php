<?php

namespace Lorem\WebInstaller\Controllers;

use App\Http\Controllers\Controller;
use Lorem\WebInstaller\Helpers\EnvironmentManager;
use Illuminate\Http\Request;

class EnvironmentController extends Controller
{
    /**
     * @var EnvironmentManager
     */
    protected $environmentManager;

    /**
     * EnvironmentController constructor.
     * @param EnvironmentManager $environmentManager
     */
    public function __construct(EnvironmentManager $environmentManager)
    {
        $this->environmentManager = $environmentManager;
    }

    /**
     * Display the environment page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show()
    {
        $envFields = config('installer.environment');

        return view('installer::environment', compact('envFields'));
    }

    /**
     * Store the env from request.
     *
     * @param Request $request
     */
    public function store(Request $request)
    {
        $this->environmentManager->validateEnv($request->except('_token'));
        $this->environmentManager->save($request->except('_token'));

        return view('installer::finish');
    }
}
