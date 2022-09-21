@extends('layouts.app')

@section('main')
     <!-- BLOCK apropos -->
     <section>
      <div class="container flex flex-col px-5 pt-16 mx-auto md:pt-32">

            <form action="/mail"  method="POST" class="container w-full max-w-xl p-8 mx-auto space-y-6 bg-blue-900 shadow rounded-xl ng-untouched ng-pristine ng-valid">
              @csrf
              <h2 class="w-full text-3xl font-bold leading-tight text-white">Contactez Moi</h2>
              <div>
                <label for="name" class="block mb-1 ml-1 text-white">Nom Prénom</label>
                <input id="name" type="text" placeholder="Nom Prénom" required="" class="block w-full p-2 rounded focus:outline-none focus:ring focus:ring-opacity-25 focus:ring-blue-400">
                <div data-lastpass-icon-root="true" style="position: relative !important; height: 0px !important; width: 0px !important; float: left !important;"></div>
              </div>
              <div>
                <label for="email" class="block mb-1 ml-1 text-white">Email</label>
                <input id="email" type="email" placeholder="Adresse email" required="" class="block w-full p-2 rounded focus:outline-none focus:ring focus:ring-opacity-25 focus:ring-blue-400">
              </div>
              <div>
                <label for="message" class="block mb-1 ml-1 text-white">Message</label>
                <textarea name="message" id="message" type="text" placeholder="Message..." class="block w-full p-2 rounded autoexpand focus:outline-none focus:ring focus:ring-opacity-25 focus:ring-blue-400"></textarea>
              </div>
              <div>
                <button type="submit" class="w-full px-4 py-2 font-bold bg-blue-600 rounded shadow focus:outline-none hover:bg-green-800">Envoyer</button>
              </div>
            </form>
  
      </div>
    </section>
   
@endsection