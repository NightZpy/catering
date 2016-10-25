var objectRow = {            
	id: "",
	name: "",
	servings_quantity: "",
	description: "",
	photo: "",
	type_id: "",
	type_name: "", 
	total_weight_format: "",
	cost_mp_x_recipe_format: "",
	cost_mp_x_ration_format: "",	
	base: {
		id: "",
		code: "",
		name: "",
		servings_quantity: "",
		quantity: "",
		description: "",
		photo: "",
		type_id: "",
		type_name: "", 		
		created_at: "",
		updated_at: "",
		deleted_at: ""
	},
	utensil: {
		id: "",
		name: "",
		stock: "",
		category_id: "",
		created_at: "",
		updated_at: "",
		deleted_at: ""
	},
	pivot_base: {
		required_quantity: "",
		base_id: "",
		cost: 0			
	},
	pivot_utensil: {
		utensil_id: ""			
	}
};

var tableColumns = [
	{
	    name: 'id',
	    sortField: 'id',
	    visible: false,
	},
	{
	    name: 'code',
	    sortField: 'code',
	    visible: true,
	    title: 'Código'
	},
	{
	    name: 'name',
	    sortField: 'name',
	    visible: true,
	    title: 'Nombre'
	},
	{
	    name: 'servings_quantity',
	    sortField: 'servings_quantity',
	    visible: true,
	    title: "Raciones"
	},
	{
	    name: 'total_weight_format',
	    sortField: 'total_weight_format',
	    visible: true,
	    title: "Peso total"
	},
	{
	    name: 'cost_mp_x_recipe_format',
	    sortField: 'cost_mp_x_recipe_format',
	    visible: true,
	    title: "Costo MP X Receta"
	},
	{
	    name: 'cost_mp_x_ration_format',
	    sortField: 'cost_mp_x_ration_format',
	    visible: true,
	    title: "Costo MP X Ración"
	},	
	{
	    name: 'description',
	    sortField: 'description',
	    visible: false,
	    title: 'Descripción',
	    size: 30
	},
	{
	    name: 'photo',
	    sortField: 'photo',
	    visible: false
	},
	{
	    name: 'type.name',
	    sortField: 'type-recipe_types.name',
	    visible: true,
	    title: 'Tipo'
	},       
    {
        name: '__actions',
        dataClass: 'center aligned',
        callback: null
    }        
];

var actions = [
    { name: 'view-item', label: 'Ver', icon: 'glyphicon glyphicon-zoom-in', class: 'btn btn-info', extra: {'title': 'View', 'data-toggle':"tooltip", 'data-placement': "left"} },
    { name: 'edit-item', label: 'Editar', icon: 'glyphicon glyphicon-pencil', class: 'btn btn-warning', extra: {title: 'Edit', 'data-toggle':"tooltip", 'data-placement': "top"} },
    { name: 'delete-item', label: 'Eliminar', icon: 'glyphicon glyphicon-remove', class: 'btn btn-danger', extra: {title: 'Delete', 'data-toggle':"tooltip", 'data-placement': "right" } },
    { name: 'ADD:related:base', relate: 'BaseRecipe', label: 'Asociar receta base', icon: 'glyphicon glyphicon-plus', class: 'btn btn-success', extra: {'title': 'Add BaseRecipe', 'data-toggle':"tooltip", 'data-placement': "left"} },
    { name: 'LINK:related:base', relate: 'BaseRecipe', label: 'Ver receta base', icon: 'glyphicon glyphicon-th-list', class: 'btn btn-success', extra: {title: 'BaseRecipes', 'data-toggle':"tooltip", 'data-placement': "right" } },
    { name: 'LINK:related:utensil', relate: 'Utensil', label: 'Ver utensilios', icon: 'glyphicon glyphicon-th-list', class: 'btn btn-success', extra: {title: 'Utensils', 'data-toggle':"tooltip", 'data-placement': "right" } }
];

var modals = {
	baseADD: false,
};