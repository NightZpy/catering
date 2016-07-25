var objectRow = {            
	id: "",
	name: "",
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
	    name: 'name',
	    sortField: 'name',
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