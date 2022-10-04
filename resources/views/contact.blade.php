@extends('layouts.app')

@section('main')
    <!-- BLOCK apropos -->
    <section>
        @if (session('Message_envoyé'))
            <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000, PopupUser())" class="pt-1 pr-4">
                <div id="popmenu" class="px-4 py-2 text-xs btnmenu text-emerald-500">&zwnj; Email envoyé</div>
            </div>
        @endif
        @if (session('already_send'))
            <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000, PopupUser())" class="pt-1 pr-4">
                <div id="popmenu" class="px-4 py-2 text-xs btnmenu text-emerald-500">&zwnj; Vous avez déja envoyé un
                    message aujourd'hui</div>
            </div>
        @endif

        <div class="container flex flex-col px-5 pt-16 mx-auto md:pt-32">

            <form id="add-user-form" method="post" action="/email" class="container w-full max-w-xl p-8 mx-auto space-y-6 bg-blue-900 shadow rounded-xl">
                @csrf
                <h2 class="w-full text-3xl font-boldleading-tight text-white">Contactez Moi</h2>
                <div>
                    <label for="name" class="block mb-1 ml-1 text-white">Nom Prénom</label>
                    <input name="name" type="text" id="name" placeholder="Nom Prénom"  class="block w-full p-2 rounded focus:outline-none focus:ring focus:ring-opacity-25 focus:ring-blue-400" required>
                </div>
                <div>
                    <label for="email" class="block mb-1 ml-1 text-white">Email</label>
                    <input name="email" type="email" id="email" placeholder="Adresse email" class="block w-full p-2 rounded focus:outline-none focus:ring focus:ring-opacity-25 focus:ring-blue-400" required>
                </div>
                <div>
                    <label for="message" class="block mb-1 ml-1 text-white">Message</label>
                    <textarea name="message" id="message" type="text" placeholder="Message..." class="block w-full p-2 rounded autoexpand focus:outline-none focus:ring focus:ring-opacity-25 focus:ring-blue-400" required></textarea>
                </div>
                <div>
                    <button type="submit"
                        class="w-full px-4 py-2 font-bold bg-blue-600 rounded shadow focus:outline-none hover:bg-green-800">Envoyer</button>
                </div>
            </form>

        </div>
    </section>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
                function PopupUser() {
                    console.log('okpop');
                    var updateElement = document.getElementById("popmenu");
                    updateElement.classList.toggle("active");

                }
    </script>


    <style>
        #popmenu {
            position: fixed;
            top: -50px;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 100;
            background-color: #46515F;
            text-decoration: none;
            transition: 0.25s;
            border-radius: 8px;
            user-select: none;
            overflow: hidden;

        }

        #popmenu.active {
            top: 120px;
            transition: 0.3s;
            transition: 0.25s;
        }

        @media (max-width: 640px) {
            #popmenu.active {
                top: 225px;
                transition: 0.3s;
                transition: 0.25s;
            }
        }
    </style>
@endsection
