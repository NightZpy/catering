var objectRow = {            
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
	    name: 'quantity',
	    sortField: 'quantity',
	    title: 'Cantidad',
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
	    name: 'type_name',
	    sortField: 'type_name',
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
    { name: 'add-provider', label: '', icon: 'glyphicon glyphicon-plus', class: 'btn btn-success', extra: {title: 'Add Provider', 'data-toggle':"tooltip", 'data-placement': "right" } }
];