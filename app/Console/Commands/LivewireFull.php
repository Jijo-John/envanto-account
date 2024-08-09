<?php

namespace App\Console\Commands;

use Illuminate\Support\Str;
use Illuminate\Console\Command;

class LivewireFull extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:livewire-full {name} {model}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');
        $this->call('make:livewire', [
            'name' => $name,
        ]);
        $this->updateBladeFile($name);
        $this->updateComponetFile($name);
    }
    
    public function updateBladeFile($file)
    {
        $name = Str::kebab($file);
        if (Str::contains($name, '/')) {
            $name = Str::replaceFirst('-', '', $name);
        }
        $class_name = Str::afterLast($file, '/');
        $class_name = preg_replace('/(?<!\ )[A-Z]/', ' $0', $class_name);
        $path = base_path('resources/views/livewire/'.$name.'.blade.php');
        $stub = file_get_contents(base_path('resources/stubs/blade.stub'));
        $stub = str_replace('$CLASSNAME$', ucfirst($class_name), $stub);
        file_put_contents($path, $stub);
    }
    
    public function updateComponetFile($name)
    {
        $path = base_path('app/Livewire/'.$name.'.php');
        $namespace = 'App\Livewire';
        if (Str::contains($name, '/')) {
            $namespace .= '\\'.Str::beforeLast($name, '/');
        }
        $class_name = Str::afterLast($name, '/');
        $blade_name = Str::kebab($name);
        if (Str::contains($blade_name, '/')) {
            $blade_name = Str::replaceFirst('-', '', $blade_name);
            $blade_name = Str::replaceFirst('/', '.', $blade_name);
        }
        
        $stub = file_get_contents(base_path('resources/stubs/component.stub'));
        $stub = str_replace('$NAMESPACE$', $namespace, $stub);
        $stub = str_replace('$CLASS_NAME$', $class_name, $stub);
        $stub = str_replace('$VIEWBLADE$', $blade_name, $stub);
        $stub = str_replace('$MODEL$', $this->argument('model'), $stub);
        file_put_contents($path, $stub);
    }
}
