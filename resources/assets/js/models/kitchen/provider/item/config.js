var objectRow = 
{            
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
	    name: 'code',
	    sortField: 'code',
	    title: 'Código',
	    visible: true
	},
	{
	    name: 'name',
	    sortField: 'name',
	    title: 'Item',
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
    { name: 'SHOW:related:item', label: 'Ver', icon: 'glyphicon glyphicon-zoom-in', class: 'btn btn-info', extra: {'title': 'View', 'data-toggle':"tooltip", 'data-placement': "left"} },
    { name: 'EDIT:related:item', label: 'Editar', icon: 'glyphicon glyphicon-pencil', class: 'btn btn-warning', extra: {title: 'Edit', 'data-toggle':"tooltip", 'data-placement': "top"} },
    { name: 'DELETE:related:item', label: 'Eliminar', icon: 'glyphicon glyphicon-remove', class: 'btn btn-danger', extra: {title: 'Delete', 'data-toggle':"tooltip", 'data-placement': "right" } },
];

var modals = {
	itemADD: false,
	itemSHOW: false,
	itemEDIT: false,
	itemDELETE: false,
	item_ADD_inform:false,
	unit_ADD_inform: false,
	presentation_ADD_inform: false,
	family_ADD_inform: false,
	subFamily_ADD_inform: false,
};
