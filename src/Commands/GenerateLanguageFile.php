<?php

namespace MrAtiebatie\GenerateLanguageFile\Commands;

use Illuminate\Console\Command;

class GenerateLanguageFile extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate-language-file';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate the language files for JavaScript';

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
        $lang = config('app.locale');

        $files   = glob(resource_path('lang/' . $lang . '/*.php'));
        $strings = [];

        foreach ($files as $file) {
            $name           = basename($file, '.php');
            $strings[$name] = require $file;
        }

        // Generate JavaScript line
        $javascript = 'window.i18n = ' . json_encode($strings) . ';';

        if (file_put_contents(base_path('public/js/lang.js'), $javascript)) {
            $this->info('Language file generated...');
        } else {
            $this->error('Error generating language file...');
        }
    }
}
