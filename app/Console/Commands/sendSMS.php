<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Twilio\Rest\Client;

class sendSMS extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sendSMS';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Envía SMS desde UNISALUD';

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
     * @return int
     */
    public function handle()
    {
        // Your Account SID and Auth Token from twilio.com/console
        $account_sid = env("TWILIO_ACCOUNT_SID");
        $auth_token = env("TWILIO_AUTH_TOKEN");
        // A Twilio number you own with SMS capabilities
        $twilio_number = env("TWILIO_NUMBER");

        $phone_number = '+56982598059';
        $sms_body = 'Primer mensaje de texto enviado desde UNISALUD.';

        $client = new Client($account_sid, $auth_token);
        $client->messages->create(
            $phone_number,
            array(
                'from' => $twilio_number,
                'body' => $sms_body
            )
        );
    }
}
