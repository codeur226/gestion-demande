{{-- @extends('errors::minimal')

@section('title', __('Server Error'))
@section('code', '500')
@section('message', __('Server Error')) --}}


<x-application-layout title=" | Erreur serveur">
    <div class="container">
        <div class="row">
            <div style="margin-top: 15%" class="col-md-12">
                <h1 class="text-center"> 500</h1>
                <h3 class="text-center"> Erreur serveur</h3>
            </div>
        </div>
    </div>
</x-application-layout>