{{-- This file is used to store sidebar items, inside the Backpack admin panel --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<li class="nav-item"><a class="nav-link" href="{{ backpack_url('user') }}"><i class="nav-icon la la-user"></i> Utilisateurs</a></li>
{{-- <li class="nav-item"><a class="nav-link" href="{{ backpack_url('elfinder') }}"><i class="nav-icon la la-files-o"></i> Fichiers</span></a></li> --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('graff') }}"><i class="nav-icon la la-brush"></i> Liste des Graffs</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('regions') }}"><i class="nav-icon la la-map"></i> Regions</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('setting') }}'><i class='nav-icon la la-cog'></i> <span>Settings</span></a></li>