<?php

namespace App\Services;

use Minishlink\WebPush\WebPush;
use Minishlink\WebPush\Subscription;
use Minishlink\WebPush\VAPID;

class PushNotificationService
{
    protected $webPush;

    public function __construct()
    {
        $this->webPush = new WebPush([
            'VAPID' => [
                'publicKey' => env('VAPID_PUBLIC_KEY'),
                'privateKey' => env('VAPID_PRIVATE_KEY'),
                'subject' => env('VAPID_EMAIL'),
            ],
        ]);
    }

    public function sendNotification($subscription, $payload)
    {
        $this->webPush->sendNotification(
            Subscription::create($subscription),
            $payload
        );
    }
}
