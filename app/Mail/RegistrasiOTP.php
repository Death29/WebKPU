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
    public function __construct($nim, $nama, $otp, $otp_expire)
    {
        $this->nim = $nim;
        $this->nama = $nama;
        $this->otp = $otp;
        $this->otp_expire = $otp_expire;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from("kmuii.kpu@gmail.com")
                        ->view("otpemail")
                        ->with([
                            "nim" => $this->nim,
                            "nama" => $this->nama,
                            "otp" => $this->otp,
                            "otp_expire" => $this->otp_expire,
                        ]);
    }
}
