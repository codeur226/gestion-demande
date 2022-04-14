@component('mail::message')
# Votre demande de stage à été bien reçu. 

## Veuillez bien noter le code de votre demande pour la suite de la procédure. 
## Vous devrez utiliser ce code et votre adresse e-mail pour consulter l'état d'avancement de votre demande

### le code de votre demande: <span style="color: green">{{ $demande->code }}</span> 

@component('mail::button', ['url' => route("formconsulter")])
Consulter ma demande
@endcomponent

Merci,<br>
{{ config('app.name') }}
## <span style="color: blue"> Agence Nationle de promotion des technologies de l'information et de la communication</span>
@endcomponent
