var objectRow = {            
	id: "",
	code: "",
	name: "",
	auto_provider: "",
	perishable: "",
	decrease: "",
	to_buy: "",
	min_stock: "",
	current_stock: "",
	currency: "",
	unit_id: "",
	presentation_id: "",
	type: "",
	family_id: "",
	sub_family_id: "",
	item_type_id: "",
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
	},
	unit: {
		id: "",
		name: "",
		symbol: ""
	},
	presentation: {
		id: "",
		name: ""
	},
	family: {
		id: "",
		name: ""
	},
	sub_family: {
		id: "",
		name: "",
		family_id: ""
	},
	item_type: {
		id: "",
		name: "",
	}
};

var tableColumns = [
	{
	    name: 'id',
	    sortField: 'id',
	    visible: false
	},
	{
	    name: 'family_name',
	    sortField: 'sub_family.family.name',
	    title: 'Familia',
	    visible: true
	},       
	{
	    name: 'sub_family_name',
	    sortField: 'sub_family.name',
	    title: 'Sub-familia',
	    visible: true
	},
	{
	    name: 'name',
	    sortField: 'name',
	    title: 'Nombre',
	    visible: true
	},	    	
	{
	    name: 'type',
	    sortField: 'type',
	    title: 'Tipo',
	    visible: true
	},	
	{
	    name: 'unit_name',
	    sortField: 'unit.name',
	    title: 'Unidad',
	    visible: true
	},
	{
	    name: 'item_type_name',
	    sortField: 'item_type.name',
	    title: 'Tipo de item',
	    visible: true
	},
	{
	    name: 'presentation_name',
	    sortField: 'presentation.name',
	    title: 'Presentación',
	    visible: true
	},	
	{
	    name: 'current_stock',
	    sortField: 'current_stock',
	    title: 'Cantidad',
	    visible: true
	},	
	{
	    name: 'decrease',
	    sortField: 'decrease',
	    title: 'Merma',
	    visible: true
	},		
    {
        name: 'compose_code',
        title: 'Código compuesto',
        visible: true
    }, 
	{
	    name: 'min_stock',
	    sortField: 'min_stock',
	    title: 'Stock mínimo',
	    visible: true
	},    		
	{
	    name: 'code',
	    sortField: 'id',
	    title: 'Código',
	    visible: false
	},
	{
	    name: 'auto_provider_format',
	    sortField: 'auto_provider',
	    match: 'auto_provider',
	    title: 'Auto-proveedor',
	    visible: false
	},
	{
	    name: 'perishable_format',
	    sortField: 'perishable',
	    title: 'Perecible',
	    visible: false
	},
	{
	    name: 'to_buy',
	    sortField: 'to_buy',
	    title: 'Comprar',
	    visible: false
	},	
	{
	    name: 'currency',
	    sortField: 'currency',
	    title: 'Moneda',
	    visible: false
	},   
    {
        name: '__actions',
        dataClass: 'center aligned',
        callback: null
    }        
];

var actions = [
    { name: 'view-item', label: 'Ver', show: true, icon: 'glyphicon glyphicon-zoom-in', class: 'btn btn-info', extra: {'title': 'View', 'data-toggle':"tooltip", 'data-placement': "left"} },
    { name: 'edit-item', label: 'Editar', show: true, icon: 'glyphicon glyphicon-pencil', class: 'btn btn-warning', extra: {title: 'Edit', 'data-toggle':"tooltip", 'data-placement': "top"} },
    { name: 'delete-item', label: 'Eliminar', show: true, icon: 'glyphicon glyphicon-remove', class: 'btn btn-danger', extra: {title: 'Delete', 'data-toggle':"tooltip", 'data-placement': "right" } },
    //{ name: 'addProviderToItem', label: '', icon: 'glyphicon glyphicon-plus', class: 'btn btn-success', extra: {title: 'Add Provider', 'data-toggle':"tooltip", 'data-placement': "right" } },
    { name: 'ADD:related:provider', label: 'Asociar proveedor', show: true, icon: 'glyphicon glyphicon-plus', class: 'btn btn-success', extra: {'title': 'Add Provider', 'data-toggle':"tooltip", 'data-placement': "left"} },
    { name: 'LINK:related:provider', label: 'Ver proveedores', show: true, icon: 'glyphicon glyphicon-th-list', class: 'btn btn-success', extra: {title: 'Providers', 'data-toggle':"tooltip", 'data-placement': "right" } }
];

var modals = {
	providerADD: false,
	provider_ADD: false,
	unit_ADD_inform: false,
	presentation_ADD_inform: false,
	family_ADD_inform: false,
	subFamily_ADD_inform: false,
	itemType_ADD_inform:false
};