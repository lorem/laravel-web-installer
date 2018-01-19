<ol class="steps">
    <li class="{{ Route::currentRouteName() == 'installer.index' ? 'active' : '' }} {{ $__env->yieldContent('step') > 1 ? 'visited' : '' }}">Installer</li>
    <li class="{{ Route::currentRouteName() == 'installer.requirements' ? 'active' : '' }} {{ $__env->yieldContent('step') > 2 ? 'visited' : '' }}">Requirements</li>
    <li class="{{ Route::currentRouteName() == 'installer.permissions' ? 'active' : '' }} {{ $__env->yieldContent('step') > 3 ? 'visited' : '' }}">Permissions</li>
    <li class="{{ Route::currentRouteName() == 'installer.environment' ? 'active' : '' }} {{ $__env->yieldContent('step') > 4 ? 'visited' : '' }}">Environment</li>
    <li class="{{ Route::currentRouteName() == 'installer.finish' ? 'active' : '' }} {{ $__env->yieldContent('step') > 5 ? 'visited' : '' }}">Finished</li>
</ol>