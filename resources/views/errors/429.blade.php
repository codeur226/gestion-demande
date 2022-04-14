{{-- @extends('errors::minimal')

@section('title', __('Too Many Requests'))
@section('code', '429')
@section('message', __('Too Many Requests')) --}}


<x-application-layout title=" | Trop de demandes ">
    <div class="container">
        <div class="row">
            <div style="margin-top: 15%" class="col-md-12">
                <h1 class="text-center"> 429</h1>
                <h3 class="text-center"> trop de demandes essayer plus tard</h3>
            </div>
        </div>
    </div>       
</x-application-layout>