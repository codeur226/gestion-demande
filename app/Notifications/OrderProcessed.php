<?php

namespace App\Notifications;

use App\Models\Demande;
use Illuminate\Bus\Queueable;
use App\Channels\WhatsAppChannel;
use App\Channels\Messages\WhatsAppMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Helpers\helpers;

class OrderProcessed extends Notification
{
    use Queueable;

    protected $demande;
    /**
     * Créer une nouvelle instance de notification.
     *
     * @return void
     */
    public function __construct(Demande $demande)
    {
        $this->demande = $demande;
    }

    /**
     * Canal de livraison de la notification
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [WhatsAppChannel::class];
    }

    /** 
     *  Corps du message à envoyer
     * 
    */
    public function toWhatsApp($notifiable)
    {
        $demandeUrl = url("/demandes/{$this->demande->id}");
        $company = 'ANPTIC';
        //$deliveryDate = $this->demande->created_at->addDays(4)->toFormattedDateString();
        $domain = getValeur($this->demande->domaine);
        $type_demande = getValeur($this->demande->type);


        return (new WhatsAppMessage)
            ->content("Votre société {$company} vient de recevoir une demande de stage de {$type_demande} dans le département {$domain}.");
    }
}