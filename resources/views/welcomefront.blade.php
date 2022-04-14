<x-application-layout title=" | Accueil">
  <link rel="stylesheet" href="../../css/style.css">
  @include('front-office/partials.header')
  
    {{--  edit welcomes --}} 
  
{{--start body--}}
<div class="container">
    <section class="mb-4 hauteurbas">
      <div class="col-md-12">
        <!-- -->   <img src="../../front-office/assets/img/stage.png" alt="..." class="img-fluid mt-6 center-block text-center animated zoomInDown animation-delay-5">
      </div>
    </section>
  </div> <!-- container -->
  <div class="card">
    <div class="card-body snd_color">
     
      <p class="monserrat" style="text-align:center;color: rgb(248, 245, 245); ">L'ANPTIC, le Label du Numérique !</p>
     
     {{-- <div class="center">
      <p class="monserrat" style="text-align:center;color: rgb(248, 245, 245); ">Donnez nous votre avis en laissant votre commentaire ! </p>
      <form action="" style="text-align: center;">
        <textarea name="commentaire" id="commentaire" cols="50" rows="3" placeholder="Saisissez votre commentaire içi !"></textarea>
      </form>
       </div> 

    </div>
    <p class="monserrat" style="text-align:center;color: rgb(224, 30, 30); ">Commentaire 1 {{ now() }} </p>
    <p class="monserrat" style="text-align:center;color: rgb(224, 30, 30); ">Commentaire 2 {{ now() }} </p>

  </div>    --}}
</x-application-layout>