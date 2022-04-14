<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AjoutDemande extends Mailable
{
    use Queueable;
    use SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($demanderencour)
    {
        $this->demande = $demanderencour;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $demande = $this->demande;

        return $this->markdown('emails.demandes.ajout-demande', compact('demande'));
        // return $this->markdown('emails.produits.ajout-produit');
            //  return $this->subject("Un nouveau produit sur OpenShop")->from("marketing@open-shop.com","Service Marketing de OpenShop")->markdown('emails.produits.ajout-produit');
    }
}
