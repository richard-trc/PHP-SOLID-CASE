<?php
// 依赖反转原则违反案例
class Mailer
{
}

class SendWelcomeMessage
{
    private $mailer;

    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }
}

// 重构优化
interface Mailer
{
    public function send();
}

class SmtpMailer implements Mailer
{
    public function send()
    {
    }
}

class SendGridMailer implements Mailer
{
    public function send()
    {
    }
}

class SendWelcomeMessage
{
    private $mailer;
    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }
}