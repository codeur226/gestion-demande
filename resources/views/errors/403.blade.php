{{-- @extends('errors::minimal')

@section('title', __('Forbidden'))
@section('code', '403')
@section('message', __($exception->getMessage() ?: 'Forbidden')) --}}

<x-application-layout title=" | Accès réfusé">
    <div class="container">
        <div class="row">
            <div style="margin-top: 15%" class="col-md-12">
                <h1 class="text-center"> 403</h1>
                <h3 class="text-center"> accès réfusé </h3>
            </div>
        </div>
    </div>
</x-application-layout>