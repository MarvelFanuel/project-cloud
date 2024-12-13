<?php

namespace App\Services;

use Aws\Sns\SnsClient;

class SNSService
{
    protected $snsClient;

    public function __construct()
    {
        $this->snsClient = new SnsClient([
            'version' => 'latest',
            'region'  => config('services.sns.region'),
            'credentials' => [
                'key'    => config('services.sns.key'),
                'secret' => config('services.sns.secret'),
            ],
        ]);
    }

    public function publishMessage($message, $subject = null)
    {
        try {
            $result = $this->snsClient->publish([
                'TopicArn' => config('services.sns.topic_arn'),
                'Message'  => $message,
                'Subject'  => $subject,
            ]);
            return $result;
        } catch (\Exception $e) {
            throw new \Exception('SNS Error: ' . $e->getMessage());
        }
    }
}
