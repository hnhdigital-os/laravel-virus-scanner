<?php

namespace Bluora\LaravelVirusScanner;

use Illuminate\Console\Command;
use Symfony\Component\Yaml\Exception\ParseException;
use Symfony\Component\Yaml\Yaml;

class VirusScannerCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'virus:scan {path} {--config-file=}';

    /**
     * The console command description.
     *
     * @var strings
     */
    protected $description = 'Scan a folder or a file.';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $path = realpath($this->argument('path'));
        $exclude_filename = is_dir($path) ? "--exclude='\.virus\.'" : '';
        $command = sprintf('clamscan %s --no-summary -r --infected %s', $path, $exclude_filename);
        $output = [];
        $return_var  = 0;

        exec($command, $output, $return_var);

        // Process each file by renaming and logging it.
        // We convert it to a dot file (hidden) 
        foreach ($output as $line) {
            list($file_path, $virus) = explode(': ', $line);
            $file_pathinfo = pathinfo($file_path);

            $path_exists = true;
            $counter = 0;

            while ($path_exists) {
                $new_file_path = $file_pathinfo['dirname'].'/.virus.'.$file_pathinfo['basename'].($counter > 0 ? '.'.$counter : '');
                $path_exists = file_exists($new_file_path);
                $counter++;
            }

            rename($file_path, $new_file_path);
        }
    }
}
