<li class="{{ Request::is('providers*') ? 'active' : '' }}">
    <a href="{!! route('kitchen.providers.index') !!}"><i class="fa fa-edit"></i><span>Providers</span></a>
</li>

<li class="{{ Request::is('types*') ? 'active' : '' }}">
    <a href="{!! route('types.index') !!}"><i class="fa fa-edit"></i><span>Types</span></a>
</li>

<li class="{{ Request::is('presentations*') ? 'active' : '' }}">
    <a href="{!! route('presentations.index') !!}"><i class="fa fa-edit"></i><span>Presentations</span></a>
    
<li class="{{ Request::is('units*') ? 'active' : '' }}">
    <a href="{!! route('units.index') !!}"><i class="fa fa-edit"></i><span>Units</span></a>
</li>

<li class="{{ Request::is('inputMaterials*') ? 'active' : '' }}">
    <a href="{!! route('inputMaterials.index') !!}"><i class="fa fa-edit"></i><span>InputMaterials</span></a>
</li>

<li class="{{ Request::is('families*') ? 'active' : '' }}">
    <a href="{!! route('families.index') !!}"><i class="fa fa-edit"></i><span>Families</span></a>
</li>

<li class="{{ Request::is('subFamilies*') ? 'active' : '' }}">
    <a href="{!! route('subFamilies.index') !!}"><i class="fa fa-edit"></i><span>SubFamilies</span></a>
</li>

