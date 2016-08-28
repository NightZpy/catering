var objectRow = {            
	id: "",
	name: "",
	servings_quantity: "",
	description: "",
	photo: "",
	recipe_type_id: ""
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
	    title: "Cantidad por ración"
	},
	{
	    name: 'description',
	    sortField: 'description',
	    visible: true,
	    title: 'Descripción'
	},
	{
	    name: 'photo',
	    sortField: 'photo',
	    visible: false
	},
	{
	    name: 'type.name',
	    sortField: 'type.name',
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
    { name: 'ADD:related:baseRecipe', relate: 'BaseRecipes', label: 'Asociar receta base', icon: 'glyphicon glyphicon-plus', class: 'btn btn-success', extra: {'title': 'Add BaseRecipe', 'data-toggle':"tooltip", 'data-placement': "left"} },
    { name: 'LINK:related:baseRecipe', relate: 'BaseRecipes', label: 'Ver receta base', icon: 'glyphicon glyphicon-th-list', class: 'btn btn-success', extra: {title: 'BaseRecipes', 'data-toggle':"tooltip", 'data-placement': "right" } },
    { name: 'ADD:related:utensil', relate: 'Utensilios', label: 'Asociar utensilio', icon: 'glyphicon glyphicon-plus', class: 'btn btn-success', extra: {'title': 'Add Utensil', 'data-toggle':"tooltip", 'data-placement': "left"} },
    { name: 'LINK:related:utensil', relate: 'Utensilios', label: 'Ver utensilios', icon: 'glyphicon glyphicon-th-list', class: 'btn btn-success', extra: {title: 'Utensils', 'data-toggle':"tooltip", 'data-placement': "right" } }
];

var modals = {
	baseRecipeADD: false,
	utensilADD: false
};