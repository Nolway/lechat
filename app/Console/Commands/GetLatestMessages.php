<?php

namespace App\Console\Commands;

use App\Message;
use Illuminate\Console\Command;

class GetLatestMessages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'chat:last {--limit=10} {--room=all}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get latest messages (optional by room with --room)';

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
        $room = $this->option('room');
        $limit = $this->option('limit');

        $messages = Message::orderBy('id', 'desc')->take($limit);

        if ($room !== 'all') {
            $messages->where('room_id',$room);
        }

        $messages = $messages->get()->reverse();
        foreach ($messages as $message) {
            $this->line('[' . $message->created_at->format('m/d/Y H:i:s') . '] ' . $message->user->name . ' : ' . $message->body);
        }
    }
}
