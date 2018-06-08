<?php

namespace ESIK\Jobs\ESI;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use ESIK\Models\Member;
use ESIK\Http\Controllers\DataController;

class GetStructure implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $member, $id, $dataCont;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Member $member, int $id)
    {
        $this->member = $member;
        $this->id = $id;
        $this->dataCont = new DataController();
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        return $this->dataCont->getStructure($this->member, $this->id)->status;
    }
}