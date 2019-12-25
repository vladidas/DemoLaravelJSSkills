<?php

namespace App\Services\Dashboard\Console;

use App\Services\Dashboard\Features\SubDistrict\ImportSubDistrictsFeature;

/**
 * Class SyncSubDistrictsCommand
 * @package App\Services\Dashboard\Console
 * @author  Vlad Golubtsov <v.golubtsov@bvblogic.com>
 */
class ImportSubDistrictsCommand extends LucidCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'data:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parse sub-districts info and saving to the DB in the queue';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->dispatch(new ImportSubDistrictsFeature());
    }
}
