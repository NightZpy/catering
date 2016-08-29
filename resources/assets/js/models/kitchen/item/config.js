var objectRow = {            
	id: "",
	code: "",
	name: "",
	auto_provider: "",
	perishable: "",
	to_buy: "",
	min_stock: "",
	current_stock: "",
	currency: "",
	unit_id: "",
	presentation_id: "",
	type: "",
	family_id: "",
	sub_family_id: "",
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
	pivot: {
		price: "",
		selected: "",      
		provider_id: ""			
	}
};

var tableColumns = [
	{
	    name: 'id',
	    sortField: 'id',
	    visible: false
	},
	{
	    name: 'code',
	    sortField: 'code',
	    title: 'Código',
	    visible: true
	},
	{
	    name: 'name',
	    sortField: 'name',
	    title: 'Nombre',
	    visible: true
	},
	{
	    name: 'auto_provider_format',
	    sortField: 'auto_provider_format',
	    match: 'auto_provider',
	    title: 'Auto-proveedor',
	    visible: true
	},
	{
	    name: 'perishable_format',
	    sortField: 'perishable_format',
	    title: 'Perecible',
	    visible: true
	},
	{
	    name: 'min_stock',
	    sortField: 'min_stock',
	    title: 'Stock mínimo',
	    visible: true
	},
	{
	    name: 'current_stock',
	    sortField: 'current_stock',
	    title: 'Cantidad',
	    visible: true
	},
	{
	    name: 'to_buy',
	    sortField: 'to_buy',
	    title: 'Comprar',
	    visible: true
	},	
	{
	    name: 'currency',
	    sortField: 'currency',
	    title: 'Moneda',
	    visible: true
	},
	{
	    name: 'unit_name',
	    sortField: 'unit_name',
	    title: 'Unidad',
	    visible: true
	},
	{
	    name: 'presentation_name',
	    sortField: 'presentation_name',
	    title: 'Presentación',
	    visible: true
	},
	{
	    name: 'type',
	    sortField: 'type',
	    title: 'Tipo',
	    visible: true
	},
    {
        name: 'compose_code',
        title: 'Código compuesto',
        sortField: 'compose_code',
        visible: true
    }, 	
	{
	    name: 'family_name',
	    sortField: 'family_name',
	    title: 'Familia',
	    visible: true
	},       
	{
	    name: 'sub_family_name',
	    sortField: 'sub_family_name',
	    title: 'Sub-familia',
	    visible: true
	},       
    {
        name: '__actions',
        dataClass: 'center aligned',
        callback: null
    }        
];

var actions = [
    { name: 'view-item', label: '', icon: 'glyphicon glyphicon-zoom-in', class: 'btn btn-info', extra: {'title': 'View', 'data-toggle':"tooltip", 'data-placement': "left"} },
    { name: 'edit-item', label: '', icon: 'glyphicon glyphicon-pencil', class: 'btn btn-warning', extra: {title: 'Edit', 'data-toggle':"tooltip", 'data-placement': "top"} },
    { name: 'delete-item', label: '', icon: 'glyphicon glyphicon-remove', class: 'btn btn-danger', extra: {title: 'Delete', 'data-toggle':"tooltip", 'data-placement': "right" } },
    //{ name: 'addProviderToItem', label: '', icon: 'glyphicon glyphicon-plus', class: 'btn btn-success', extra: {title: 'Add Provider', 'data-toggle':"tooltip", 'data-placement': "right" } },
    { name: 'ADD:related:provider', label: '', icon: 'glyphicon glyphicon-plus', class: 'btn btn-success', extra: {'title': 'Add Provider', 'data-toggle':"tooltip", 'data-placement': "left"} },
    { name: 'LINK:related:provider', label: '', icon: 'glyphicon glyphicon-th-list', class: 'btn btn-success', extra: {title: 'Providers', 'data-toggle':"tooltip", 'data-placement': "right" } }
];

var modals = {
	providerADD: false
};