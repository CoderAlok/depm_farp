<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Exporter;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        switch ($this->data['mail_type']) {
            case 1:
                $data['title'] = 'Exporters application registered';
                $data['view']  = 'mailer-view.exporter_register_mail';
                $data['data']  = Exporter::where('id', $this->data['id'])->first();
                break;

            case 2:
                $data['title'] = 'Exporters application ';
                $data['view']  = 'mailer-view.exporter_application_approval_mail';
                $data['data']  = Exporter::where('id', $this->data['id'])->with('get_remarks_details')->first();
                break;

            case 3:
                $data['title'] = 'Forgot password.';
                $data['view']  = 'mailer-view.exporter_forgot_password_mail';
                $data['data']  = '';
                break;

            default:
                // $data['title'] = '';
                // $data['view']  = '';
                break;
        }

        return $this->view($data['view'])->with($data);
        // ->attach('/path/to/file');
    }
}
