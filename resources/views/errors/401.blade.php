{{-- @extends('errors::minimal')

@section('title', __('Unauthorized'))
@section('code', '401')
@section('message', __('Unauthorized')) --}}



<x-application-layout title=" | Accès non autorisé">
    <div class="container">
        <div class="row">
            <div style="margin-top: 15%" class="col-md-12">
                <h1 class="text-center"> 401</h1>
                <h3 class="text-center"> Désolé ! Vous essayer d'accéder à une ressource protégée ! !</h3>
            </div>
        </div>
    </div>
       
</x-application-layout>