<?php

Route::prefix('installer')->namespace('Lorem\WebInstaller\Controllers')->middleware(['IsInstallable'])->group(function () {
    Route::get('/', 'InstallerController@index')->name('installer.index');
    Route::get('requirements', 'RequirementController@requirements')->name('installer.requirements');
    Route::get('permissions', 'PermissionController@checkPermissions')->name('installer.permissions');
    Route::get('environment', 'EnvironmentController@show')->name('installer.environment');
    Route::post('environment', 'EnvironmentController@store')->name('installer.environment.store');
    Route::get('database', 'DatabaseController@run')->name('installer.database');
    Route::get('finished', 'FinishController@end')->name('installer.finished');
});
