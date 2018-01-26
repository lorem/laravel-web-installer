<?php

namespace Lorem\WebInstaller\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Lorem\WebInstaller\Helpers\EnvironmentManager;

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
     * @return mixed
     */
    public function store(Request $request)
    {
        $validation = $this->environmentManager->validateEnv($request->except('_token'));

        if ($validation->fails()) {
            return redirect()->back()->withInput()->withErrors($validation);
        }

        $this->environmentManager->save($request->except('_token'));

        return redirect()->route('installer.finished');
    }
}
