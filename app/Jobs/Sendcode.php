<?php
namespace App\jobs;
use App\Models\User;
use Twilio\Rest\Client;
use App\Mail\HelloEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Twilio\Exceptions\TwilioException;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Twilio\Exceptions\ConfigurationException;

class Sendcode implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    private $user;
    private $twilioClient;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        // dd($user);
        $this->user = $user;
        $sid = config('services.twilio.account_sid');
        $token = config('services.twilio.auth_token');
        $this->twilioClient = new Client($sid, $token);
        // dd($this->twilioClient);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // dd("sana");
        // $email = new HelloEmail();
        // Mail::to('sanaramzan17225@gmail.com')->send($email);
        $template = "Please check in again to verify your presence ";
        $body = rand(70000,100);

        // dd($body);
        $message = $this->twilioClient->messages->create(
            '+9203164377598',
            [
                'from' => '+18606504094',
                'body' => $body
            ]
        );
        Log::info($message->sid);
    }
}
// php artisan make:command CodeReminderCommand
