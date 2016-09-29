var objectRow = {            
	id: "",
	name: "",
	stock: "",
	cost: "",
	units_x_100: "",
	category_id: ""
};

var tableColumns = [
	{
	    name: 'id',
	    sortField: 'id',
	    visible: false
	},
	{
	    name: 'name',
	    sortField: 'name',
	    visible: true,
	    title: 'Nombre'
	},
	{
	    name: 'stock',
	    sortField: 'stock',
	    visible: true
	},
	{
	    name: 'cost',
	    sortField: 'cost',
	    visible: true
	},
	{
	    name: 'units_x_100',
	    sortField: 'units_x_100',
	    title: 'Un. por 100 pers',
	    visible: true
	},
	{
		name: 'total_cost_format',
	    sortField: 'total_cost',
	    title: 'Costo total',
	    visible: true
	},
	{
	    name: 'category_name',
	    sortField: 'table.name',
	    visible: true,
	    title: 'Categoría'
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
            { name: 'delete-item', label: 'Eliminar', icon: 'glyphicon glyphicon-remove', class: 'btn btn-danger', extra: {title: 'Delete', 'data-toggle':"tooltip", 'data-placement': "right" } }
];