var objectRow = {
	id: "",
	code: "",
	name: "",   
	item: {
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
		created_at: "",
		updated_at: "",
		deleted_at: ""
	},
	unit: {
		name: ""
	},
	pivot_item: {
		//purchase_quantity: "",
		decrease: "" ,
		servings_quantity: "",
		item_id: "",
        total_quantity: "",
        total_quantity_format: "",
        cost: "",
        cost_format: ""
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
	    name: 'presentation_name',
	    sortField: 'presentation.name',
	    title: 'Presentación',
	    visible: true
	},
	{
	    name: 'unit_name',
	    sortField: 'unit.name',
	    title: 'Unidad',
	    visible: true
	},  	
	/*{
	    name: 'pivot.purchase_quantity',
	    sortField: 'purchase_quantity',
	    title: 'Cantidad compra',
	    visible: true
	}, */     
	{
	    name: 'current_stock',
	    sortField: 'current_stock',
	    title: 'Cantidad compra',
	    visible: true
	}, 
	{
	    name: 'cost',
	    sortField: 'pivot.cost',
	    title: 'Costo por cantidad', //Error
	    visible: true
	},      
	{
	    name: 'pivot.decrease',
	    sortField: 'decrease',
	    title: 'Merma',
	    visible: true
	}, 	
	{
	    name: 'pivot.servings_quantity',
	    sortField: 'servings_quantity',
	    title: 'Ración de insumo',
	    visible: true
	},		
	{
	    name: 'pivot.total_quantity_format',
	    sortField: 'pivot.total_quantity_format',
	    title: 'Cantidad total',
	    visible: true
	},	
	{
	    name: 'pivot.cost_format',
	    sortField: 'pivot.cost_format',
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
    { name: 'SHOW:related:item', label: 'Ver', icon: 'glyphicon glyphicon-zoom-in', class: 'btn btn-info', extra: {'title': 'View', 'data-toggle':"tooltip", 'data-placement': "left"} },
    { name: 'EDIT:related:item', label: 'Editar', icon: 'glyphicon glyphicon-pencil', class: 'btn btn-warning', extra: {title: 'Edit', 'data-toggle':"tooltip", 'data-placement': "top"} },
    { name: 'DELETE:related:item', label: 'Eliminar', icon: 'glyphicon glyphicon-remove', class: 'btn btn-danger', extra: {title: 'Delete', 'data-toggle':"tooltip", 'data-placement': "right" } },
];

var modals = {
	itemADD: false,
	itemSHOW: false,
	itemEDIT: false,
	itemDELETE: false
};