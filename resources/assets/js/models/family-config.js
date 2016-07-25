var mapVar = 'inputMaterialsOptions'; 

var objectRow = {            
    id: "",
    name: "",
    code: "",
    created_at: "",
    updated_at: ""
};

var tableColumns = [
    {
        name: 'id',
        sortField: 'id',
        visible: false
    },
    {
        name: 'name',
        title: 'Nombre',
        sortField: 'name',
        visible: true
    },
    {
        name: 'code',
        title: "Código",
        sortField: 'code',
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
        name: '__actions',
        dataClass: 'center aligned',
        callback: null
    }        
];