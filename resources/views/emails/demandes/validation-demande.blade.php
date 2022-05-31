@component('mail::message')
# Bonjour, Monsieur /Madame  {{ $demande->prenom  }} {{ $demande->nom  }}

Votre demande de stage a été accordée pour la période du <span style="color: red">{{ $demande->date_debut  }} </span> au <span style="color: red">{{ $demande->date_fin  }}</span> 
 
Veuillez prendre attache la Direction des ressources humaines pour les conditions de votre stage!
En rappel, le code de votre demande: <span style="color: green">{{ $demande->code }}</span>

@component('mail::button', ['url' => route("formconsulter")])
Consulter ma demande
@endcomponent

Merci,<br>
{{ config('app.name') }}
## <span style="color: blue"> Agence Nationle de promotion des technologies de l'information et de la communication</span>
@endcomponent
