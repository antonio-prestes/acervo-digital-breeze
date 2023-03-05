<?php

namespace Tests\Unit;

use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class ContactMailTest extends TestCase
{
    /** @test */
    public function it_can_send_contact_email()
    {
        $data = [
            'name' => 'Diego Prestes',
            'email' => 'diego@test.com',
            'message' => 'This is a test message',
        ];

        Mail::fake();

        Mail::to('contact@test.com')->send(new ContactMail($data));

        Mail::assertSent(ContactMail::class, function ($mail) use ($data) {
            return $mail->hasTo('contact@test.com') &&
                $mail->data['name'] === $data['name'] &&
                $mail->data['email'] === $data['email'] &&
                $mail->data['message'] === $data['message'];
        });
    }
}
