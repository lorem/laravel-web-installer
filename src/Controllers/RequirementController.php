<?php

namespace Lorem\WebInstaller\Controllers;

use App\Http\Controllers\Controller;
use Lorem\WebInstaller\Helpers\RequirementsChecker;

class RequirementController extends Controller
{
    /**
     * @var RequirementsChecker
     */
    protected $requirements;

    /**
     * @param RequirementsChecker $checker
     */
    public function __construct(RequirementsChecker $checker)
    {
        $this->requirements = $checker;
    }

    /**
     * Display the requirements page.
     *
     * @return \Illuminate\View\View
     */
    public function requirements()
    {
        $phpSupportInfo = $this->requirements->checkPHPversion(
            config('installer.core.min_php_version')
        );

        $requirements = $this->requirements->check(
            config('installer.requirements')
        );

        return view('installer::requirements', compact('requirements', 'phpSupportInfo'));
    }
}
