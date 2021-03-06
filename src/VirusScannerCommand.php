<?php

namespace Bluora\LaravelVirusScanner;

use Illuminate\Console\Command;

class VirusScannerCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'virus:scan {path}';

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
        $command = sprintf('clamscan %s --no-summary -r --infected %s 2> /dev/null', $path, "--exclude='\.virus\.'");
        $output = [];
        $return_var = 0;

        exec($command, $output, $return_var);

        if (count($output)) {
            $this->error('Viruses have been found!');
            $this->line('');
            $this->line(' Quarantining...');
            $this->line('');
        }

        // Process each file by renaming and logging it.
        // We convert it to a dot file (hidden)
        foreach ($output as $line) {
            list($file_path, $virus) = explode(': ', $line);
            $this->line(sprintf('Found %s in %s.', $virus, $file_path));
            $file_pathinfo = pathinfo($file_path);

            $path_exists = true;
            $counter = 0;

            // Keep creating a file name until we find a file that does not exist.
            while ($path_exists) {
                $new_file_path = $file_pathinfo['dirname'].'/.virus.'.$file_pathinfo['basename'].($counter > 0 ? '.'.$counter : '');
                $path_exists = file_exists($new_file_path);
                $counter++;
            }

            $this->line(sprintf(' * %s', $file_path));

            // Check it exists before renaming.
            if (file_exists($file_path)) {
                rename($file_path, $new_file_path);
            }
        }

        if (count($output)) {
            $this->line('');
        }
    }
}
