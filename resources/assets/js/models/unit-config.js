var objectRow = {            
	id: "",
	name: "",
	symbol: ""
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
	    name: 'symbol',
	    sortField: 'symbol',
	    visible: true
	},       
    {
        name: '__actions',
        dataClass: 'center aligned',
        callback: null
    }        
];