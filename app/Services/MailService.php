<?php namespace App\Services;

use Mail;
use Psy\Exception\Exception;

class MailService extends Service
{

    public function enquiryNotification($array)
    {
        try {
            Mail::send('emails.enquiry', [
                'array' => $array
            ], function ($message){
                $message->to('hitesh@yopmail.com','Hitesh Dingankar')->subject("New Enquiry.");
            });
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }

        return;

    }

}