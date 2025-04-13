<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class MakeRepositoryCommand extends Command
{
    protected $signature = 'make:repository {model}';
    protected $description = 'Create a repository, interface, service, and controller for a model';

    public function handle()
    {
        $model = $this->argument('model');
        $interfaceName = "{$model}RepositoryInterface";
        $repositoryName = "{$model}Repository";
        $serviceName = "{$model}Service";
        $controllerName = "{$model}Controller";

        // Paths
        $interfacePath = app_path("Repositories/Interfaces/{$interfaceName}.php");
        $repositoryPath = app_path("Repositories/Eloquent/{$repositoryName}.php");
        $servicePath = app_path("Services/{$serviceName}.php");
        $controllerPath = app_path("Http/Controllers/{$controllerName}.php");

        // Create Interface
        if (!File::exists($interfacePath)) {
            File::ensureDirectoryExists(app_path('Repositories/Interfaces'));
            File::put($interfacePath, $this->getInterfaceContent($interfaceName));
            $this->info("Interface created: {$interfaceName}");
        }

        // Create Repository
        if (!File::exists($repositoryPath)) {
            File::ensureDirectoryExists(app_path('Repositories/Eloquent'));
            File::put($repositoryPath, $this->getRepositoryContent($repositoryName, $interfaceName, $model));
            $this->info("Repository created: {$repositoryName}");
        }

        // Create Service
        if (!File::exists($servicePath)) {
            File::ensureDirectoryExists(app_path('Services'));
            File::put($servicePath, $this->getServiceContent($serviceName, $interfaceName, $model));
            $this->info("Service created: {$serviceName}");
        }

        // Create Controller
        if (!File::exists($controllerPath)) {
            File::ensureDirectoryExists(app_path('Http/Controllers'));
            File::put($controllerPath, $this->getControllerContent($controllerName, $serviceName, $model));
            $this->info("Controller created: {$controllerName}");
        }
    }

    private function getInterfaceContent($interface)
    {
        return <<<PHP
<?php

namespace App\Repositories\Interfaces;

interface {$interface}
{
    public function all();
    public function findById(int \$id);
    public function create(array \$data);
    public function update(int \$id, array \$data);
    public function delete(int \$id);
}
PHP;
    }

    private function getRepositoryContent($class, $interface, $model)
    {
        return <<<PHP
<?php

namespace App\Repositories\Eloquent;

use App\Models\\{$model};
use App\Repositories\Interfaces\\{$interface};

class {$class} implements {$interface}
{
    public function all()
    {
        return {$model}::all();
    }

    public function findById(int \$id)
    {
        return {$model}::find(\$id);
    }

    public function create(array \$data)
    {
        return {$model}::create(\$data);
    }

    public function update(int \$id, array \$data)
    {
        \$model = {$model}::findOrFail(\$id);
        \$model->update(\$data);
        return \$model;
    }

    public function delete(int \$id)
    {
        return {$model}::destroy(\$id);
    }
}
PHP;
    }

    private function getServiceContent($service, $interface, $model)
    {
        return <<<PHP
<?php

namespace App\Services;

use App\Repositories\Interfaces\\{$interface};

class {$service}
{
    protected \$repository;

    public function __construct({$interface} \$repository)
    {
        \$this->repository = \$repository;
    }

    public function all()
    {
        return \$this->repository->all();
    }

    public function findById(int \$id)
    {
        return \$this->repository->findById(\$id);
    }

    public function create(array \$data)
    {
        return \$this->repository->create(\$data);
    }

    public function update(int \$id, array \$data)
    {
        return \$this->repository->update(\$id, \$data);
    }

    public function delete(int \$id)
    {
        return \$this->repository->delete(\$id);
    }
}
PHP;
    }

    private function getControllerContent($controller, $service, $model)
    {
        $modelVariable = Str::camel($model);

        return <<<PHP
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\\{$service};

class {$controller} extends Controller
{
    protected \${$modelVariable}Service;

    public function __construct({$service} \${$modelVariable}Service)
    {
        \$this->{$modelVariable}Service = \${$modelVariable}Service;
    }

    public function index()
    {
        return response()->json(\$this->{$modelVariable}Service->all());
    }

    public function show(\$id)
    {
        return response()->json(\$this->{$modelVariable}Service->findById(\$id));
    }

    public function store(Request \$request)
    {
        return response()->json(\$this->{$modelVariable}Service->create(\$request->all()));
    }

    public function update(Request \$request, \$id)
    {
        return response()->json(\$this->{$modelVariable}Service->update(\$id, \$request->all()));
    }

    public function destroy(\$id)
    {
        return response()->json(\$this->{$modelVariable}Service->delete(\$id));
    }
}
PHP;
    }
}
