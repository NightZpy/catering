var objectRow = {
	id: "",
	code: "",
	name: "",   
	item: {
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
		purchase_quantity: "",
		cost_per_quantity: "",     
		decrease: "" ,
		servings_quantity: "",
		item_id: ""			
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
	    name: 'purchase_quantity',
	    sortField: 'purchase_quantity',
	    title: 'Cantidad compra',
	    visible: true
	},      
	{
	    name: 'cost_per_quantity',
	    sortField: 'cost_per_quantity',
	    title: 'Costo por cantidad',
	    visible: true
	},      
	{
	    name: 'decrease',
	    sortField: 'decrease',
	    title: 'Merma',
	    visible: true
	}, 	
	{
	    name: 'servings_quantity',
	    sortField: 'servings_quantity',
	    title: 'Ración',
	    visible: true
	},		
    {
        name: '__actions',
        dataClass: 'center aligned',
        callback: null
    }        
];

var actions = [
    { name: 'SHOW:related:item', label: '', icon: 'glyphicon glyphicon-zoom-in', class: 'btn btn-info', extra: {'title': 'View', 'data-toggle':"tooltip", 'data-placement': "left"} },
    { name: 'EDIT:related:item', label: '', icon: 'glyphicon glyphicon-pencil', class: 'btn btn-warning', extra: {title: 'Edit', 'data-toggle':"tooltip", 'data-placement': "top"} },
    { name: 'DELETE:related:item', label: '', icon: 'glyphicon glyphicon-remove', class: 'btn btn-danger', extra: {title: 'Delete', 'data-toggle':"tooltip", 'data-placement': "right" } },
];

var modals = {
	itemADD: false,
	itemSHOW: false,
	itemEDIT: false,
	itemDELETE: false
};