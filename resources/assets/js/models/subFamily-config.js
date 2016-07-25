var mapVar = 'inputMaterialsOptions'; 

var objectRow = {            
    id: "",
    name: "",
    code: "",
    family_id: "",
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
        name: 'family_code',
        title: 'Código familia',
        sortField: 'family_code',
        visible: true
    },    
    {
        name: 'family_name',
        title: 'Familia',
        sortField: 'family_name',
        visible: true
    },
    {
        name: 'code',
        title: "Código sub-familia",
        sortField: 'code',
        visible: true
    },
    {
        name: 'name',
        title: 'Sub-familia',
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
        name: '__actions',
        dataClass: 'center aligned',
        callback: null
    }        
];