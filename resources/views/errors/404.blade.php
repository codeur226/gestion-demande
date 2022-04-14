{{-- @extends('errors::minimal')

@section('title', __('Not Found'))
@section('code', '404')
@section('message', __('Not Found')) --}}

<x-application-layout title=" | Page introuvable">
  
    {{--  edit welcomes --}} 
  
{{--start body--}}
<div class="container">
    <section class="mb-4">
        <div class="row">
            <div style="margin-top: 15%" class="col-md-12">
                <h1 class="text-center"> 404</h1>
                <h3 class="text-center"> Oups ! La page que vous rechercher n'existe pas !</h3>
            </div>
        </div>
    </section>
  </div> <!-- container -->
 
  {{--end body--}}

   
</x-application-layout>