<?php

namespace Goszowski\CrudGeneratorAdminLte\Commands;

use File;
use Illuminate\Console\Command;
use Caffeinated\Modules\Facades\module;
use Illuminate\Support\Facades\Artisan;
use App\Permission;
use App\Role;

class CrudCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crud:generate
                            {name : The name of the Crud.}
                            {--fields= : Fields name for the form & model.}
                            {--route=yes : Include Crud route to routes.php? yes|no.}
                            {--pk=id : The name of the primary key.}
                            {--view-path= : The name of the view path.}
                            {--namespace= : Namespace of the controller.}
                            {--route-group= : Prefix of the route group.}
                            {--localize=yes : Localize the generated files? yes|no. }
                            {--locales=en : Locales to create lang files for.}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate Crud including controller, model, views & migrations.';

    /** @var string  */
    protected $routeName = '';

    /** @var string  */
    protected $controller = '';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $name = $this->argument('name');
        $modelName = str_singular($name);
        $migrationName = str_plural(snake_case($name));
        $tableName = $migrationName;

        $routeGroup = $this->option('route-group');
        $this->routeName = ($routeGroup) ? $routeGroup . '/' . snake_case($name, '-') : snake_case($name, '-');

        $controllerNamespace = ($this->option('namespace')) ? $this->option('namespace') . '\\' : '';

        $fields = $this->option('fields');
        $primaryKey = $this->option('pk');
        $viewPath = $this->option('view-path');

        $fieldsArray = explode(',', $fields);
        $requiredFieldsStr = '';
        $fillableArray = [];

        foreach ($fieldsArray as $item) {
            $spareParts = explode('#', trim($item));
            $fillableArray[] = $spareParts[0];

            $currentField = trim($spareParts[0]);
            $requiredFieldsStr .= (isset($spareParts[2]))
            ? "'$currentField' => '{$spareParts[2]}', " : '';
        }

        $commaSeparetedString = implode("', '", $fillableArray);
        $fillable = "['" . $commaSeparetedString . "']";

        $requiredFields = ($requiredFieldsStr != '') ? "[" . $requiredFieldsStr . "]" : '';

        $perm = new Permission();
        $perm->name         = 'access-'.strtolower($name);
        $perm->display_name = 'Access '.$name; // optional
        $perm->save();

        $perm = new Permission();
        $perm->name         = 'create-'.strtolower($name);
        $perm->display_name = 'Can Create '.$name; // optional
        $perm->save();

        $perm = new Permission();
        $perm->name         = 'edit-'.strtolower($name);
        $perm->display_name = 'Can Edit '.$name; // optional
        $perm->save();

        $perm = new Permission();
        $perm->name         = 'delete-'.strtolower($name);
        $perm->display_name = 'Can Delete '.$name; // optional
        $perm->save();

        $localize = $this->option('localize');
        $locales = $this->option('locales');
        Artisan::call('make:module', ["slug"=>$name,"--quick"=> true ]);
        $this->call('crud:controller', ['name' => $controllerNamespace . $name . 'Controller', '--crud-name' => $name, '--model-name' => $modelName, '--view-path' => $viewPath, '--required-fields' => $requiredFields, '--route-group' => $routeGroup]);
        $this->call('crud:model', ['name' => $modelName, '--fillable' => $fillable, '--table' => $tableName, '--pk' => $primaryKey, '--module-name' => $name]);
        $this->call('crud:migration', ['name' => $migrationName, '--schema' => $fields, '--pk' => $primaryKey, '--module-name' => $name]);
        Artisan::call('module:migrate');
        $this->call('crud:view', ['name' => $name, '--fields' => $fields, '--view-path' => $viewPath, '--route-group' => $routeGroup, '--localize' => $localize, '--pk' => $primaryKey, '--module-name' => $name]);
        if ($this->option('localize') == 'yes') {
            $this->call('crud:lang', ['name' => $name, '--fields' => $fields, '--locales' => $locales]);
        }



        // For optimizing the class loader
        $this->callSilent('optimize');
        $modulePath = module_path(null,$name.'\Routes\web.php');
        // Updating the Http/routes.php file
        $routeFile = $modulePath;

        if (file_exists($routeFile) && (strtolower($this->option('route')) === 'yes')) {
            $this->controller = ($controllerNamespace != '') ? $controllerNamespace . '\\' . $name . 'Controller' : $name . 'Controller';
            $isAdded = File::append($routeFile, "\n" . implode("\n", $this->addRoutes()));

            if ($isAdded) {
                $this->info('Crud/Resource route added to ' . $routeFile);
            } else {
                $this->info('Unable to add the route to ' . $routeFile);
            }
        }


        //Menus
        $modules = Module::all();

        $MenuMiddlewarePath = base_path("app/Http/Middleware/");
        $MenuFile = $MenuMiddlewarePath."MenuMiddleware.php";

        $isAddedMenu = File::put($MenuFile, $this->addMenus($modules));

        if ($isAddedMenu) {
            $this->info('Crud/Resource menu added to ' . $MenuFile);
        } else {
            $this->info('Unable to add the menu to ' . $MenuFile);
        }


    }

    /**
     * Add routes.
     *
     * @return  array
     */
    protected function addRoutes()
    {
        return ["

        Route::group(['prefix' => '" . $this->routeName . "'], function () {

            Route::get('/', '" . ucfirst ($this->routeName) . "Controller@index');
            Route::get('/create', '" . ucfirst ($this->routeName) . "Controller@create');
            Route::post('/store', '" . ucfirst ($this->routeName) . "Controller@store');
            Route::get('/edit/{id}', '" .  ucfirst ($this->routeName) . "Controller@edit');
            Route::patch('/update/{id}', '" .  ucfirst ($this->routeName) . "Controller@update');
            Route::get('/show/{id}', '" .  ucfirst ($this->routeName) . "Controller@show');
            Route::delete('/delete/{id}', '" .  ucfirst ($this->routeName) . "Controller@destroy');

        });

        "];
    }

    /**
     * Add Menus.
     *
     * @return  array
     */
    protected function addMenus($modules)
    {

        $stub = File::get($this->getStub());
        $arq = "";
        $arquivo = "Menu::make('example', function(Builder \$menu) {\n";
        foreach ($modules as $key => $value) {
            $arq .= "\t\t\t\$menu->add('$key', '".strtolower($key)."');\n";
        }
        $arquivo .= $arq;
        $arquivo .= "\t\t});";

        $stub = str_replace(
            '##Menus##', $arquivo, $stub
        );



        return $stub;
    }


    protected function addPermisson(){

    }


    protected function getStub()
    {
        return config('crudgenerator.custom_template')
        ? config('crudgenerator.path') . '/MenuMiddleware.stub'
        : __DIR__ . '/../stubs/MenuMiddleware.stub';
    }


}
