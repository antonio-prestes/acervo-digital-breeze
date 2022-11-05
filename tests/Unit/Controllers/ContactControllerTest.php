<?php

namespace Tests\Unit\Controllers;

use App\Http\Controllers\ContactController;
use App\Http\Requests\ContactRequest;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class ContactControllerTest extends TestCase
{

    public function testAccessContactPage()
    {
        $response = $this->get('/contact');

        $response->assertStatus(200);
    }

    public function testSendContactEmail(): void
    {
        Mail::fake();

        $email = new ContactRequest([
            'name' => 'Diego',
            'email' => 'diego@diego.com',
            'message' => 'test'
        ]);

        $contactController = new ContactController();
        $contactController->create($email);

        Mail::assertSent(ContactMail::class);
    }
}
