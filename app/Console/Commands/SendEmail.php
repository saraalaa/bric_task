<?php

namespace App\Console\Commands;

use App\Mail\WelcomeCustomerMail;
use App\Models\Customer;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email to customer';

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
        if (Customer::count())
        {
            $customer = Customer::first();
            Mail::to($customer->email)->send(new WelcomeCustomerMail($customer->name));

            $this->info('email send successfully');
        }
        else
        {
            $this->info('No customer exist');
        }
    }
}
