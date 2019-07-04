<?php

namespace App\Console\Commands;

use App\Message;
use App\User;
use Illuminate\Console\Command;

class SearchMessageBy extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'chat:search {search} {--limit=50} {--room=all}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Search string on messages';

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
        $search = $this->argument('search');

        $messages = Message::orderBy('id', 'desc')->where('body', 'LIKE', '%' . $search . '%')->take($limit);

        if ($room !== 'all') {
            $messages->where('room_id',$room);
        }

        $messages = $messages->get()->reverse();

        foreach ($messages as $message) {
            $this->line('[' . $message->created_at->format('m/d/Y H:i:s') . '] ' . $message->user->name . ' : ' . $message->body);
        }
    }
}
