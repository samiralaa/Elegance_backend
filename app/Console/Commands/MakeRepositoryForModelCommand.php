<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeRepositoryForModelCommand extends Command
{
    protected $signature = 'make:repository {model}';
    protected $description = 'Create a repository for a specific model';

    public function handle()
    {
        // Get the model name
        $model = $this->argument('model');
        $repositoryName = "{$model}Repository";
        $interfaceName = "{$model}RepositoryInterface";

        // Define paths
        $repositoryPath = app_path("Repositories/{$repositoryName}.php");

        // Create repository only
        if (!File::exists($repositoryPath)) {
            File::ensureDirectoryExists(app_path('Repositories'));
            File::put($repositoryPath, $this->getRepositoryContent($repositoryName, $model));
            $this->info("Repository created: {$repositoryName}");
        }

        $this->line("\nDon't forget to add this binding in your AppServiceProvider:");
        $this->line("→ \$this->app->bind(App\\Repositories\\{$repositoryName}::class, App\\Repositories\\{$repositoryName}::class);");
    }

    private function getRepositoryContent($repositoryName, $model)
    {
        return <<<PHP
<?php

namespace App\Repositories;

use App\Models\\{$model};

class {$repositoryName}
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
        return \$model->update(\$data);
    }

    public function delete(int \$id)
    {
        return {$model}::destroy(\$id);
    }
}
PHP;
    }
}
