var objectRow = {
	id: "",
	name: "",
	servings_quantity: "",
	description: "",
	photo: "",
	type_id: "",
	type_name: "", 
	cost_mp_x_recipe: "",
	cost_mp_x_ration: "",
	item: {
		id: "",
		code: "",
		name: "",
		specialty: "",
		district: "",
		address: "",
		phone: "",
		movil1: "",
		movil2: "",
		contact: "",
		email: "",
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
	pivot_item: {
		purchase_quantity: "",
		decrease: "" ,
		servings_quantity: "",
		item_id: ""			
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
	    title: 'Descripción'
	},
	{
	    name: 'photo',
	    sortField: 'photo',
	    visible: false,
	    title: 'Foto'
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
    { name: 'ADD:related:item', relate: 'Items', label: 'Asociar item', icon: 'glyphicon glyphicon-plus', class: 'btn btn-success', extra: {'title': 'Add Item', 'data-toggle':"tooltip", 'data-placement': "left"} },
    { name: 'LINK:related:item', relate: 'Items', label: 'Ver items', icon: 'glyphicon glyphicon-th-list', class: 'btn btn-success', extra: {title: 'Items', 'data-toggle':"tooltip", 'data-placement': "right" } },
    //{ name: 'ADD:related:utensil', relate: 'Utensilios', label: 'Asociar utensilio', icon: 'glyphicon glyphicon-plus', class: 'btn btn-success', extra: {'title': 'Add Utensil', 'data-toggle':"tooltip", 'data-placement': "left"} },
    { name: 'LINK:related:utensil', relate: 'Utensilios', label: 'Ver utensilios', icon: 'glyphicon glyphicon-th-list', class: 'btn btn-success', extra: {title: 'Utensils', 'data-toggle':"tooltip", 'data-placement': "right" } }
];

var modals = {
	itemADD: false,
};