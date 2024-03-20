<?php

namespace App\Mail;

use App\Models\Aspirante;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Attachment;

class ComunicadoShipped extends Mailable
{
    use Queueable, SerializesModels;

    public $asunto;
    public $mensaje;
    public $adjuntos;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($asunto, $mensaje, $adjuntos = null)
    {
        $this->asunto   = $asunto;
        $this->mensaje  = $mensaje;
        $this->adjuntos = $adjuntos;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: $this->asunto,
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'mails.comunicado',
            with: [
                'mensaje' => $this->mensaje,
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        $attachs = [];
        foreach($this->adjuntos ?? [] as $key => $adjunto) {
            $attachs[] = Attachment::fromData(fn() => $adjunto, $key.".pdf")->withMime('application/pdf');
        }

        return $attachs;
    }
}
