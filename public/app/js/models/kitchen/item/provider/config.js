var objectRow = {
	id: "",
	code: "",
	name: "",   
	auto_provider: "",
	provider_data: {
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
	provider: {
		price: "",
		selected: "",      
		provider_id: ""			
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
    { name: 'view-item', label: '', icon: 'glyphicon glyphicon-zoom-in', class: 'btn btn-info', extra: {'title': 'View', 'data-toggle':"tooltip", 'data-placement': "left"} },
    { name: 'edit-item', label: '', icon: 'glyphicon glyphicon-pencil', class: 'btn btn-warning', extra: {title: 'Edit', 'data-toggle':"tooltip", 'data-placement': "top"} },
    //{ name: 'delete-item', label: '', icon: 'glyphicon glyphicon-remove', class: 'btn btn-danger', extra: {title: 'Delete', 'data-toggle':"tooltip", 'data-placement': "right" } },
    //{ name: 'addProviderToItem', label: '', icon: 'glyphicon glyphicon-plus', class: 'btn btn-success', extra: {title: 'Add Provider', 'data-toggle':"tooltip", 'data-placement': "right" } },
    { name: 'DELETE:provider', label: '', icon: 'glyphicon glyphicon-remove', class: 'btn btn-danger', extra: {title: 'Delete', 'data-toggle':"tooltip", 'data-placement': "right" } }
];

var modals = {
	addProviderToItem: false,
	providers: false
};