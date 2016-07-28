var objectRow = {   
	price: "",
	selected: "",
	item_id: "",         
	provider_id: "",
	item: {
		id: "",
		code: "",
		name: "",
		auto_provider: "",
		perishable: "",
		min_stock: "",
		quantity: "",
		currency: "",
		unit_id: "",
		presentation_id: "",
		type_id: "",
		family_id: "",
		sub_family_id: ""
	}
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
	}
};

var tableColumns = [
	{
	    name: 'item_code',
	    sortField: 'item_code',
	    title: 'Código Item',
	    visible: true
	},
	{
	    name: 'item_name',
	    sortField: 'item_name',
	    title: 'Nombre Item',
	    visible: true
	},
	{
	    name: 'provider_code',
	    sortField: 'provider_code',
	    title: 'Código Proveedor',
	    visible: true
	},
	{
	    name: 'provider_name',
	    sortField: 'provider_name',
	    title: 'Nombre Proveedor',
	    visible: true
	},      
	{
	    name: 'price_format',
	    sortField: 'price_format',
	    title: 'Precio',
	    visible: true
	},      
	{
	    name: 'selected_format',
	    sortField: 'selected_format',
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
    // { name: 'view-item', label: '', icon: 'glyphicon glyphicon-zoom-in', class: 'btn btn-info', extra: {'title': 'View', 'data-toggle':"tooltip", 'data-placement': "left"} },
    { name: 'edit-item', label: '', icon: 'glyphicon glyphicon-pencil', class: 'btn btn-warning', extra: {title: 'Edit', 'data-toggle':"tooltip", 'data-placement': "top"} },
    { name: 'delete-item', label: '', icon: 'glyphicon glyphicon-remove', class: 'btn btn-danger', extra: {title: 'Delete', 'data-toggle':"tooltip", 'data-placement': "right" } },
    { name: 'addProviderToItem', label: '', icon: 'glyphicon glyphicon-plus', class: 'btn btn-success', extra: {title: 'Add Provider', 'data-toggle':"tooltip", 'data-placement': "right" } },
    { name: 'LINK-provider', label: '', icon: 'glyphicon glyphicon-th-list', class: 'btn btn-success', extra: {title: 'Providers', 'data-toggle':"tooltip", 'data-placement': "right" } }
];

var modals = {};