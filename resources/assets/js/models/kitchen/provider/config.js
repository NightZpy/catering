var objectRow = {            
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
	deleted_at: "",
	item:{
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
	},
	pivot_item: {
		price: "",
		selected: "",      
		id: ""			
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
	    visible: true
	},
	{
	    name: 'name',
	    sortField: 'name',
	    visible: true
	},
	{
	    name: 'specialty',
	    sortField: 'specialty',
	    visible: true
	},
	{
	    name: 'district',
	    sortField: 'district',
	    visible: false
	},
	{
	    name: 'address',
	    sortField: 'address',
	    visible: false
	},
	{
	    name: 'phone',
	    sortField: 'phone',
	    visible: true
	},
	{
	    name: 'movil1',
	    sortField: 'movil1',
	    visible: false
	},
	{
	    name: 'movil2',
	    sortField: 'movil2',
	    visible: false
	},
	{
	    name: 'contact',
	    sortField: 'contact',
	    visible: true
	},
	{
	    name: 'email',
	    sortField: 'email',
	    visible: true
	},
	{
	    name: 'created_at',
	    sortField: 'created_at',
	    visible: false
	},
	{
	    name: 'updated_at',
	    sortField: 'updated_at',
	    visible: false
	},
	{
	    name: 'deleted_at',
	    sortField: 'deleted_at',
	    visible: false
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
            { name: 'ADD:related:item', label: 'Asociar Item', show: true, icon: 'glyphicon glyphicon-plus', class: 'btn btn-success', extra: {'title': 'Add Item', 'data-toggle':"tooltip", 'data-placement': "left"} },
			{ name: 'LINK:related:item', label: 'Ver items', show: true, icon: 'glyphicon glyphicon-th-list', class: 'btn btn-success', extra: {title: 'Items', 'data-toggle':"tooltip", 'data-placement': "right" } }
];

var modals = {
	itemADD: false,
	unit_ADD_inform: false,
	presentation_ADD_inform: false,
	family_ADD_inform: false,
	subFamily_ADD_inform: false,
	item_ADD_inform: false
};