<li class="{{ Request::is('providers*') ? 'active' : '' }}">
    <a href="{!! route('kitchen.providers.index') !!}"><i class="fa fa-edit"></i><span>Providers</span></a>
</li>

<li class="{{ Request::is('types*') ? 'active' : '' }}">
    <a href="{!! route('types.index') !!}"><i class="fa fa-edit"></i><span>Types</span></a>
</li>

