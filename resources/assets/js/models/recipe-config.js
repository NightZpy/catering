var objectRow = {            
	id: "",
	name: "",
	servings_quantity: "",
	description: "",
	photo: "",
	recipe_type_id: ""
};

var tableColumns = [
	{
	    name: 'id',
	    sortField: 'id',
	    visible: true
	},
	{
	    name: 'name',
	    sortField: 'name',
	    visible: true
	},
	{
	    name: 'servings_quantity',
	    sortField: 'servings_quantity',
	    visible: true
	},
	{
	    name: 'description',
	    sortField: 'description',
	    visible: true
	},
	{
	    name: 'photo',
	    sortField: 'photo',
	    visible: false
	},
	{
	    name: 'recipe_type_id',
	    sortField: 'recipe_type_id',
	    visible: true
	},       
    {
        name: '__actions',
        dataClass: 'center aligned',
        callback: null
    }        
];