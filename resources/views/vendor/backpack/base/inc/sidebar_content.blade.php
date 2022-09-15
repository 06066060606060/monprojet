{{-- This file is used to store sidebar items, inside the Backpack admin panel --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<li class="nav-item"><a class="nav-link" href="{{ backpack_url('user') }}"><i class="nav-icon la la-question"></i> Utilisateurs</a></li>
{{-- <li class="nav-item"><a class="nav-link" href="{{ backpack_url('elfinder') }}"><i class="nav-icon la la-files-o"></i> Fichiers</span></a></li> --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('graff') }}"><i class="nav-icon la la-question"></i> Liste des Graffs</a></li>