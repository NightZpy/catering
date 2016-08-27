var objectRow = {
	id: "",
	code: "",
	name: "",   
	utensil: {
		id: "",
		name: "",
		stock: "",
		category_id: ""
	},
	pivot_utensil: {
		quantity: "",
		utensil_id: ""			
	}
};

var tableColumns = [
	{
	    name: 'id',
	    sortField: 'id',
	    title: 'Código',
	    visible: true
	},
	{
	    name: 'name',
	    sortField: 'name',
	    title: 'Utensil',
	    visible: true
	},      
	{
	    name: 'pivot.quantity',
	    sortField: 'pivot.quantity',
	    title: 'Cantidad',
	    visible: true
	},      	
    {
        name: '__actions',
        dataClass: 'center aligned',
        callback: null
    }        
];

var actions = [
    { name: 'SHOW:related:utensil', 	label: 'Ver', 		icon: 'glyphicon glyphicon-zoom-in', 	class: 'btn btn-info', extra: {'title': 'View', 'data-toggle':"tooltip", 'data-placement': "left"} },
    { name: 'EDIT:related:utensil', 	label: 'Editar', 	icon: 'glyphicon glyphicon-pencil', 	class: 'btn btn-warning', extra: {title: 'Edit', 'data-toggle':"tooltip", 'data-placement': "top"} },
    { name: 'DELETE:related:utensil', 	label: 'Eliminar', 	icon: 'glyphicon glyphicon-remove', 	class: 'btn btn-danger', extra: {title: 'Delete', 'data-toggle':"tooltip", 'data-placement': "right" } },
];

var modals = {
	utensilADD: false,
	utensilSHOW: false,
	utensilEDIT: false,
	utensilDELETE: false
};