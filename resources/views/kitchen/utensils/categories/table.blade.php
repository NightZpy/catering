<div class="row">
    <div class="col-md-5">
        <div class="form-inline form-group">
            <label>{{ trans('utensilsCategory.index.buttons.search') }}</label>
            <input v-model="searchFor" class="form-control" @keyup.enter="setFilter">
            <button class="btn btn-primary" @click="setFilter"><i class="glyphicon glyphicon-search"></i></button>
            <button class="btn btn-default" @click="resetFilter">{{ trans('utensilsCategory.index.buttons.reset') }}</button>
        </div>
    </div>
    <div class="col-md-7">
        <div class="dropdown form-inline pull-right">
            <label>{{ trans('utensilsCategory.index.labels.pagination-style') }}</label>
             <select class="form-control" v-model="paginationComponent">
                <option value="vuetable-pagination-simple">{{ trans('units.index.buttons.simple') }}</option>
                <option value="vuetable-pagination-bootstrap">{{ trans('units.index.buttons.detail') }}</option>
                <option value="vuetable-pagination-dropdown">{{ trans('units.index.buttons.dropdown') }}</option>
            </select>
            <label>{{ trans('units.index.labels.items-per-page') }}</label>
            <select class="form-control" v-model="perPage">
                <option value=10>10</option>
                <option value=15>15</option>
                <option value=20>20</option>
                <option value=25>25</option>
            </select>
            <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                <i class="glyphicon glyphicon-cog"></i>
            </button>
            <ul class="dropdown-menu">
                <li v-for="field in columns">
                    <span class="checkbox">
                        <label>
                            <input type="checkbox" v-model="field.visible">
                            @{{ field.title == '' ? field.name.replace('__', '') : field.title | capitalize }}
                        </label>
                    </span>
                </li>
            </ul>
        </div>
    </div>
</div>

<div class="table-responsive" id="utensilCategories-table">
    <vuetable v-ref:vuetable
        api-url="{{ route('api.v1.kitchen.utensils.categories.index') }}"
        :fields="columns"
        pagination-path=""
        :fields="fields"
        :sort-order="sortOrder"
        table-class="table table-bordered table-striped table-hover"
        ascending-icon="glyphicon glyphicon-chevron-up"
        descending-icon="glyphicon glyphicon-chevron-down"
        pagination-class=""
        pagination-info-class=""
        pagination-component-class=""
        :pagination-component="paginationComponent"
        :item-actions="itemActions"
        :per-page="perPage"
        :append-params="moreParams"
        wrapper-class="vuetable-wrapper "
        table-wrapper=".vuetable-wrapper"
        loading-class="loading"
    ></vuetable>
</div>