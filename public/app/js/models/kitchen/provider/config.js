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
	deleted_at: ""
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
            { name: 'view-item', label: '', icon: 'glyphicon glyphicon-zoom-in', class: 'btn btn-info', extra: {'title': 'View', 'data-toggle':"tooltip", 'data-placement': "left"} },
            { name: 'edit-item', label: '', icon: 'glyphicon glyphicon-pencil', class: 'btn btn-warning', extra: {title: 'Edit', 'data-toggle':"tooltip", 'data-placement': "top"} },
            { name: 'delete-item', label: '', icon: 'glyphicon glyphicon-remove', class: 'btn btn-danger', extra: {title: 'Delete', 'data-toggle':"tooltip", 'data-placement': "right" } }
];