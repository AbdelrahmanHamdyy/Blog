<?php

namespace App\Services;

use MailchimpMarketing\ApiClient;

class MailchimpNewsletter implements Newsletter
{
    // new Newsletter(new ApiClient); // Resolving dependencies
    public function __construct(protected ApiClient $client)
    {
        //
    }

    public function subscribe(string $email, string $list = null) {
        $list ??= config('services.mailchimp.lists.subscribers');

        $mailchimp = $this->client;

        return $mailchimp->lists->addListMember($list, [
            'email_address' => $email,
            'status' => 'subscribed'
        ]);
    }
}
