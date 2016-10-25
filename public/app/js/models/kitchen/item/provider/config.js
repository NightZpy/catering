var objectRow = {
	id: "",
	code: "",
	name: "",   
	auto_provider: "",
	provider: {
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
	pivot_provider: {
		price: "",
		selected: "",      
		provider_id: ""			
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
	    title: 'Proveedor',
	    visible: true
	},      
	{
	    name: 'price_format',
	    sortField: 'pivot_price',
	    title: 'Precio',
	    visible: true
	},      
	{
	    name: 'selected_format',
	    sortField: 'pivot_selected',
	    title: 'Seleccionado',
	    visible: true
	}, 	
    {
        name: '__actions',
        dataClass: 'center aligned',
        callback: null
    }        
];

var actions = [
    { name: 'SHOW:related:provider', label: 'Ver', icon: 'glyphicon glyphicon-zoom-in', class: 'btn btn-info', extra: {'title': 'View', 'data-toggle':"tooltip", 'data-placement': "left"} },
    { name: 'EDIT:related:provider', label: 'Editar', icon: 'glyphicon glyphicon-pencil', class: 'btn btn-warning', extra: {title: 'Edit', 'data-toggle':"tooltip", 'data-placement': "top"} },
    { name: 'DELETE:related:provider', label: 'Eliminar', icon: 'glyphicon glyphicon-remove', class: 'btn btn-danger', extra: {title: 'Delete', 'data-toggle':"tooltip", 'data-placement': "right" } },
];

var modals = {
	providerADD: false,
	providerSHOW: false,
	providerEDIT: false,
	providerDELETE: false
};