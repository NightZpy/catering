var mapVar = 'inputMaterialsOptions'; 

var objectRow = {            
    id: "",
    name: "",
    code: "",
    input_material_id: "",
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
        name: 'compose_code',
        title: 'Código compuesto',
        sortField: 'compose_code',
        visible: true
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
        title: "Código subfamilia",
        sortField: 'code',
        visible: true
    },
    {
        name: 'name',
        title: 'Subfamilia',
        sortField: 'name',
        visible: true
    },
    {
        name: 'input_material_code',
        title: 'Código insumo',
        sortField: 'input_material_code',
        visible: true
    },
    {
        name: 'input_material_name',
        title: 'Insumo',
        sortField: 'input_material_name',
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