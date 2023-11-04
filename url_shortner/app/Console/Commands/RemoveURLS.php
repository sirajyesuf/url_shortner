<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\URL;
use Carbon\Carbon;


class RemoveURLS extends Command
{
   
    protected $signature = 'url:remove';

    protected $description = 'Delete urls that haven\'t been visited in the past 30 days.';

   
    public function handle()
    {

        URL::where("views",0)->whereDate("created_at",Carbon::today()->subDays(30))->delete();

        $this->info('deleted.');

    }
}
