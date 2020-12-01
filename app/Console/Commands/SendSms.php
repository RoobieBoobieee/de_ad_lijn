<?php

namespace App\Console\Commands;

use App\Models\User;
use Twilio\Rest\Client;
use Illuminate\Console\Command;

class SendSms extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:call {user}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Call a user';

    // TWILIO client
    protected $client;

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();

        $id    = config('twilio.id');
        $token = config('twilio.token');

        $this->client = new Client($id, $token);
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // $user = User::where('mobile', $this->argument('user'))->firstOrFail();

        // Use the client to do fun stuff like send text messages!
        $this->client->calls->create(
            // the number you'd like to send the message to
            '+32485933063',
            config('twilio.number'),
            [
                'url' => route('xml', ['id' => 1]),
            ]
        );
    }
}
