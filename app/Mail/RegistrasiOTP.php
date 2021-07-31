<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegistrasiOTP extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nim, $nama)
    {
        $this->nim = $nim;
        $this->nama = $nama;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $length = 6;
        $otp = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"), 1,  $length);

        return $this->from("kmuii.kpu@gmail.com")
                        ->view("otpemail")
                        ->with([
                            "nim" => $this->nim,
                            "nama" => $this->nama,
                            "otp" => $otp,
                        ]);
    }
}
