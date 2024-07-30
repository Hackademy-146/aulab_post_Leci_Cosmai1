<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

class CareerRequestMail extends Mailable
{
    use Queueable, SerializesModels;

    public $info;

    public function __construct($info)
    {
        $this->info=$info;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Nuova richiesta di lavoro ricevuta',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mail.career-request-mail',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }

    public function handle(Request $request, Closure $next): Response
    {
    if(Auth::user() && Auth::user()->is_admin){
        return $next($request);
    }

    return redirect(route('homepage'))->with('alert', 'Non sei autorizzato');
    }

}
