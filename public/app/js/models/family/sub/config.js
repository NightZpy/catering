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
        sortField: 'family.name',
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
        title: 'Creada en',
        visible: false
    },
    {
        name: 'updated_at',
        title:'Actualizada en',
        sortField: 'updated_at',
        visible: false
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