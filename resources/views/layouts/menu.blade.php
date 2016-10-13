<li class="treeview active">
    <a href="#">
        <i class="fa fa-share"></i> <span>Cocina</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu {{ Request::is('kitchen*') ? 'menu-open' : '' }}" style="display: block;">
        <li class="{{ Request::is('kitchen*') ? 'active' : '' }}">
            <a href="{!! route('kitchen.items.index') !!}"><i class="fa fa-circle-o"></i><span>Almacen</span></a>
        </li>
        <li class="active">
            <a href="#"><i class="fa fa-circle-o"></i> Utensilios
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu {{ Request::is('kitchen.utensils*') ? 'menu-open' : '' }}" style="display: block;">
                <li class="{{ Request::is('kitchen.utensils.index') ? 'active' : '' }}">
                    <a href="{!! route('kitchen.utensils.index') !!}"><i class="fa fa-edit"></i><span>Lista</span></a>
                </li>            
                <li class="{{ Request::is('kitchen.utensils.categories.index') ? 'active' : '' }}">
                    <a href="{!! route('kitchen.utensils.categories.index') !!}"><i class="fa fa-edit"></i><span>Categorías</span></a>
                </li>
            </ul>
        </li>
        <li class="active">
            <a href="#"><i class="fa fa-circle-o"></i> Recetas
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu {{ Request::is('kitchen.recipes*') ? 'menu-open' : '' }}" style="display: block;">
                <li class="{{ Request::is('kitchen.recipes.types.index') ? 'active' : '' }}">
                    <a href="{!! route('kitchen.recipes.types.index') !!}"><i class="fa fa-edit"></i><span>Tipo</span></a>
                </li>

                <li class="{{ Request::is('kitchen.recipes.bases.index') ? 'active' : '' }}">
                    <a href="{!! route('kitchen.recipes.bases.index') !!}"><i class="fa fa-edit"></i><span>Base</span></a>
                </li>

                <li class="{{ Request::is('kitchen.recipes.index') ? 'active' : '' }}">
                    <a href="{!! route('kitchen.recipes.index') !!}"><i class="fa fa-edit"></i><span>Final</span></a>
                </li>
            </ul>
        </li>
        <li class="active">
            <a href="#"><i class="fa fa-circle-o"></i> Familias
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu {{ Request::is('families*') ? 'menu-open' : '' }}" style="display: block;">
                <li class="{{ Request::is('families.index') ? 'active' : '' }}">
                    <a href="{!! route('families.index') !!}"><i class="fa fa-edit"></i><span>Families</span></a>
                </li>
                <li class="{{ Request::is('subFamilies.index') ? 'active' : '' }}">
                    <a href="{!! route('subFamilies.index') !!}"><i class="fa fa-edit"></i><span>SubFamilies</span></a>
                </li>
            </ul>
        </li>
        <li class="{{ Request::is('units*') OR Request::is('presentations*') ? 'active' : '' }}">
            <a href="#"><i class="fa fa-circle-o"></i> Miscelaneos
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu {{ Request::is('units*') OR Request::is('presentations*') ? 'menu-open' : '' }}" style="display: block;">
                <li>
                    <a href="{!! route('units.index') !!}">
                        <i class="fa fa-edit"></i>
                        <span>Unidades</span>
                    </a>
                </li>
                <li>
                    <a href="{!! route('presentations.index') !!}">
                        <i class="fa fa-edit"></i>
                        <span>Presentaciones</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="{{ Request::is('providers*') ? 'active' : '' }}"><a href="{!! route('kitchen.providers.index') !!}"><i class="fa fa-circle-o"></i> Proveedores</a></li>
    </ul>
</li>