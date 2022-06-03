<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ValidationDemande extends Mailable
{
    use Queueable;
    use SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($demande)
    {
        $this->demande = $demande;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $demande = $this->demande;

        return $this->subject('Validation de votre demande de stage')->markdown('emails.demandes.validation-demande', compact('demande'));
        // return $this->markdown('emails.produits.ajout-produit');
            //  return $this->subject("Un nouveau produit sur OpenShop")->from("marketing@open-shop.com","Service Marketing de OpenShop")->markdown('emails.produits.ajout-produit');
    }
}
