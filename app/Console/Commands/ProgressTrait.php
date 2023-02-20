<?php

namespace App\Console\Commands;

trait ProgressTrait
{

    public function showProgress()
    {
        $this->info("Please wait for processing");

        $progressBar = $this->output->createProgressBar(10);

        $progressBar->start();

        sleep(1);

        $progressBar->finish();

        $this->info("");
    }
}
