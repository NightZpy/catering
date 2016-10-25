var objectRow = {
	id: "",
	code: "",
	name: "",   
	base: {
		id: "",
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
	pivot_base: {
		required_quantity: "",
		base_id: "",
		cost: 0	
	}
};

var tableColumns = [
	{
	    name: 'code',
	    sortField: 'code',
	    title: 'Código',
	    visible: true
	},
	{
	    name: 'name',
	    sortField: 'name',
	    title: 'Base',
	    visible: true
	},  
	{
	    name: 'pivot.ration_weight_format',
	    sortField: 'pivot.ration_weight',
	    title: 'Peso por ración',
	    visible: true
	},	  
	{
	    name: 'pivot.ration_cost_format',
	    sortField: 'pivot.ration_cost',
	    title: 'Costo por ración',
	    visible: true
	},  
	{
	    name: 'pivot.required_quantity',
	    sortField: 'pivot.required_quantity',
	    title: 'Cantidad requerida',
	    visible: true
	},  
	{
	    name: 'pivot.cost_format',
	    sortField: 'pivot.cost',
	    title: 'Costo',
	    visible: true
	}, 		     	
    {
        name: '__actions',
        dataClass: 'center aligned',
        callback: null
    }        
];

var actions = [
    { name: 'SHOW:related:base', label: 'Ver', icon: 'glyphicon glyphicon-zoom-in', class: 'btn btn-info', extra: {'title': 'View', 'data-toggle':"tooltip", 'data-placement': "left"} },
    { name: 'EDIT:related:base', label: 'Editar', icon: 'glyphicon glyphicon-pencil', class: 'btn btn-warning', extra: {title: 'Edit', 'data-toggle':"tooltip", 'data-placement': "top"} },
    { name: 'DELETE:related:base', label: 'Eliminar', icon: 'glyphicon glyphicon-remove', class: 'btn btn-danger', extra: {title: 'Delete', 'data-toggle':"tooltip", 'data-placement': "right" } },
];

var modals = {
	baseADD: false,
	baseSHOW: false,
	baseEDIT: false,
	baseDELETE: false
};