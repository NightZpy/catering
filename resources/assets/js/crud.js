global.Vue = require('vue')
window.Vue = Vue;
var VueResource = require('vue-resource')
//var Vuetable = require('vuetable/src/components/Vuetable.vue')
var Vuetable = require('../vendor/vue-table/components/Vuetable.vue')
var VuetablePagination = require('vuetable/src/components/VuetablePagination.vue')
var VuetablePaginationDropdown = require('vuetable/src/components/VuetablePaginationDropdown.vue')
var VuetablePaginationBootstrap = require('vuetable/src/components/VuetablePaginationBootstrap.vue')
var VuetablePaginationSimple = require('../vendor/vue-table/components/VuetablePaginationSimple.vue')
var VueEditable = require('../vendor/vue-editable/vue-editable.js')
var VueStrap = require('../vendor/vue-strap/vue-strap.min.js')
var CustomVueSelectTemplate = require('./vue-components/vue-select.vue')
var VueValidator = require('vue-validator')
const decamelize = require('decamelize');

Vue.use(VueResource)
Vue.use(VueEditable)
Vue.use(VueValidator)

Vue.component('vuetable', Vuetable);
Vue.component('vuetable-pagination', VuetablePagination)
Vue.component('vuetable-pagination-dropdown', VuetablePaginationDropdown)
Vue.component('vuetable-pagination-bootstrap', VuetablePaginationBootstrap)
Vue.component('vuetable-pagination-simple', VuetablePaginationSimple)

Vue.http.headers.common['X-CSRF-TOKEN'] = $('meta[name="csrf-token"]').attr('content');
Vue.http.options.crossOrigin = true;
Vue.http.options.emulateJSON = true;
Vue.http.options.emulateHTTP = true;



var E_SERVER_ERROR = 'Error communicating with the server';

Vue.config.debug = true
Vue.config.devtools = true   
// Vue.config.warnExpressionErrors = true    

Vue.component('custom-error', {
  props: ['field', 'validator', 'message'],
  template: '<em><p class="error-{{field}}-{{validator}}">{{message}}</p></em>'
});

Vue.validator('email', {
  message: 'Debe introducir un email válido!', // error message with plain string
  check: function (val) { // define validator
    return /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(val)
  }
});

Vue.validator('url', function (val) {
    return /^(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?$/.test(val)
});

Vue.validator('numeric', function (val) {
    return /^[-+]?[0-9]+$/.test(val)
});

Vue.validator('unique', function (val) {
    return false;
});
/*
function copyOwnFrom (target, source) {
  Object.getOwnPropertyNames(source).forEach(function (propName) {
    Object.defineProperty(target, propName, Object.getOwnPropertyDescriptor(source, propName))
  })
  return target
}

function ValidationError () {
  copyOwnFrom(this, Error.apply(null, arguments))
}
ValidationError.prototype = Object.create(Error.prototype)
ValidationError.prototype.constructor = ValidationError

Vue.validator('exist', function (val) {
      //this.vm.checking = true // spinner on
      return fetch('/test', {
        method: 'get',
        headers: {
          'Accept': 'application/json',
          'Content-Type': 'application/json'
        },
        body: JSON.stringify({
          username: val,
          _token: token
        })
      }).then((res) => {
        this.vm.checking = false // spinner off
        return res.json()
      }).then((json) => {
        return Object.keys(json).length > 0 
          ? Promise.reject(new ValidationError(json.message))
          : Promise.resolve()
      }).catch((error) => {
        if (error instanceof ValidationError) {
          return Promise.reject(error.message)
        } else {
          return Promise.reject('unexpected error')
        }
      })    
});*/

/*VueValidator.asset('exist', function (val) {
    return function (resolve, reject) {
        // server-side validation with ajax (e.g. using `fetch` case)
        fetch('/validators/exist', {
            method: 'post',
            headers: {
                'content-type': 'application/json',
                'x-token': 'xxxxxxxx'
            },
            body: JSON.stringify({ username: val })
        }).then(function (res) {
            if (res.status === 200) {
                resolve(true)
            } else if (res.status === 400) {
                resolve(false)
            }
        }).catch(function (err) {
            // something todo ...
            reject(new Error('exist validator fail'))
        })
    }
});
*/

window.vm = new Vue({
    components: {
        modal: VueStrap.modal,
        vSelect: VueStrap.select,
        'v-option': VueStrap.option,
        CustomVueSelectTemplate
    },
    el: "#crud-app",
    mixins: [],
    data: {
        formModal: false,
        infoModal: false,
        showModal: false,
        deleteModal: false,
        lastOpenModal: [],
        localModals: (typeof(modals) !== 'undefined' ? modals : {}),
        flashMessage: null,
        defaultErrorMessage: 'Some errors in sended data, please check!.',
        flashTypeDanger: 'danger',
        flashType: null,
        successSubmit: false,
        submitMessage: "",
        url: apiUrl,           
        row: objectRow,
        foreignData: new Array(),
        searchFor: '',
        columns: tableColumns, 
        sortOrder: {
            field: fieldInitOrder,
            direction: 'asc'
        },
        perPage: 10,
        paginationComponent: 'vuetable-pagination-bootstrap',
        paginationInfoTemplate: 'แสดง {from} ถึง {to} จากทั้งหมด {total} รายการ',
        itemActions: (typeof(actions) !== 'undefined' ? actions : {}),
        moreParams: []                                 
    },
    watch: {
        'perPage': function(val, oldVal) {
            this.$broadcast('vuetable:refresh')
        },
        'paginationComponent': function(val, oldVal) {
            this.$broadcast('vuetable:load-success', this.$refs.vuetable.tablePagination)
            this.paginationConfig(this.paginationComponent)
        }
    },
    methods: {
        submit: function(model = null, type = null, related = null) {
            this.row._token = token;
            var data = this.row; 
            if (!model || model.target ) {
                var actionUrl = this.url.store;
                if (this.method == 'PATCH' || this.method == 'POST') {
                    if (this.method == 'PATCH') {
                        actionUrl = this.url.update + this.row.id;                    
                    }  
                } else if (this.method == 'DELETE') {
                    actionUrl = this.url.delete + this.row.id;                
                }  
            } else if( related ) { 
                console.log ('Related: ' + related)                    
                var url = this.url.foreign[model][type].url;
                var method = this.url.foreign[model][type].method;
                var modelId = this.row[model]['id'];
                //var modelKey = 'pivot_' + model;
                //console.log('Related: ' + modelId);
                /*if (!modelId) {
                    modelId = this.row[modelKey][model + '_id'];
                }*/
                actionUrl = url + this.row.id + '/' + modelId;
                this.method = method;  
            } else {
                actionUrl = this.url.foreign[model][type].url;
                this.method = this.url.foreign[model][type].method;  
                data = this.row[model];
                data._token = token;   
            }
            this.sendData(actionUrl, this.method, data)
                .then(this.success, this.failed);
        },
        getData: function (url = null) {
            if (!url) {
                this.sendData(this.url.show + this.row.id, 'GET')
                .then(this.success2, this.failed);                
            } else {
               this.sendData(url, 'GET')
                .then(this.success2, this.failed);    
            }
        },
        getOneData: function(url, field, assign) {
            var sendParams = {
                url: url, 
                method: 'GET', 
                data: {}
            };
            this.$http(sendParams)
                .then(
                    function(response) {
                        if (response.data.data) {
                            var data = response.data.data;
                            this.$set(assign, data[field]);
                        }
                    }, 
                    function(response) {}
                );             
        },
        available: function(url, map, data) {
            this.sendData(url, 'GET')
                .then(function (response){;
                    data = response.data.success
                    this.$set(map, data);
                }, function (response){
                    this.$set(map, false);
                });
        },
        getForeignData: function (callUrl = null, mapVar = null, related = null, action = 'index') {
            var foreign = this.url.foreign[related][action];
            if (callUrl == null)          
                callUrl = foreign.url;

            var sendParams = {url: callUrl, method: foreign.method, data: {}};
            this.$http(sendParams)
                .then(
                    function(response) {
                        if (response.data.data) {
                            var data = response.data.data;
                            var currentForeignData = vm.foreignData; 
                            currentForeignData[mapVar] = data;        
                            var count = data.length;
                            if (count === undefined)
                                count = Object.keys(data).length
                            currentForeignData[mapVar + 'Count'] = count;
                            vm.foreignData.push(currentForeignData);
                        }
                    }, 
                    function(response) {}
                );
        },
        sendData: function(callUrl, method, data = {}) {
            return this.$http({url: callUrl, method: method, data: data});
        },            
        cleanData: function() {
            this.row = objectRow;
            this.flashMessage = '';
            this.flashType = '';
        },            
        success: function(response) { 
            var lastOpenModal = this.lastOpenModal.pop();              
            if ( response.data.data ) {
                var data = response.data.data;
                var actions = lastOpenModal.split('_');
                var map = 'row';
                if ( actions.length && actions[2] == 'inform' ) {
                    map += '.' + actions[0];
                    var field = decamelize(actions[0]);
                    this.row[ field + '_id' ] = data.id; 
                }
                vm.$set(map, data);
            }
            if (this.method == 'POST' || this.method == 'PATCH' || this.method == 'DELETE')
                this.$broadcast('vuetable:reload');
            var message = response.data.message;
            vm.flashMessage = message;
            vm.flashType = 'success';
            this.closeModal(lastOpenModal);  
        },
        success2: function(response) {
            var lastOpenModal = this.lastOpenModal[0]; 
            if (response.data.data) { 
                var data = response.data.data;
                var actions = lastOpenModal.split('_');
                var map = 'row';
                if ( actions.length && actions[2] == 'inform' ) {
                    map += '.' + actions[0];
                    var field = decamelize(actions[0]);
                    this.row[ field + '_id' ] = data.id; 
                }
                vm.$set(map, data);
                //vm.row = data;
            }
            if (this.method == 'POST' || this.method == 'PATCH' || this.method == 'DELETE')
                this.$broadcast('vuetable:reload');
            var message = response.data.message;
            vm.flashMessage = message;
            vm.flashType = 'success'; 
        },
        failed: function(response) {
            console.log(JSON.stringify(response));
            vm.flashMessage = vm.defaultErrorMessage;
            vm.flashType = vm.flashTypeDanger;
            if (response.data.errors) {
                vm.updateErrors(response.data.errors);
            }
        },
        isObject: function(object) {
            return  object instanceof Object;
        },
        checkUnique: function(checkUrl) {
            console.log(checkUrl);
            this.$http({url: checkUrl, method: 'get'})
                .then(
                    function(response) {
                        return response.unique;
                    },
                    function(response) {
                        return false;
                    }
                );
        },
        updateErrors: function(errors) {
            var errorMessages = [];
            for (var fieldAttr in errors) {
                var errorMgs = errors[fieldAttr];
                for (var msg in errorMgs) {
                    errorMessages.push({ field: fieldAttr, message: errorMgs[msg] });                       
                }
            }
            //vm.$setValidationErrors(errorMessages);     
        },
        closeModal: function(modalName) {
            if (modalName == this.lastOpenModal[ this.lastOpenModal.length - 1 ])
                this.lastOpenModal.pop();
                        
            if (this.localModals[modalName] != undefined)
                this.localModals[modalName]    = false;
            else
                this.$set(modalName, false);
            //this.formModal = this.showModal = this.deleteModal = this.infoModal = false;
            this.cleanData();  
        },
        visible: function(field) {
            for (var column in this.columns) {
                if (this.columns[column].name == field || 
                    this.columns[column].name == field + '_format' ||
                    this.columns[column].name == field + '_name') 
                    return this.columns[column].visible;
            }
            return false;
        },
        modal: function(type) {  
            if (type == 'PATCH' || type == 'POST') {
                this.lastOpenModal.push('formModal');
                this.method = type;
                this.formModal = true;
            } else if (type == 'SHOW') {
                this.lastOpenModal.push('showModal');
                this.method = type;
                this.showModal = true;
            } else if (type == 'DELETE') {
                this.lastOpenModal.push('deleteModal');
                this.method = type;
                this.deleteModal = true;
            } else if (type == 'INFO') {
                this.lastOpenModal.push('infoModal');
                this.infoModal = true;
            } else {
                this.lastOpenModal.push(type);
                this.localModals[type] = true;                
            }
        },
        objectToArrayObject: function(object) {
            var array = []
            for (var key in object) {
                if (object.hasOwnProperty(key)) {
                    var data = {
                                value: key,
                                label: object[key]
                            }
                    array.push(data);
                }
            }
            return array;
        },
        /*
         * Table methods
         */
        setFilter: function() {
            this.moreParams = [
                'filter=' + this.searchFor
            ]
            this.$nextTick(function() {
                this.$broadcast('vuetable:refresh')
            })
        },
        resetFilter: function() {
            this.searchFor = ''
            this.setFilter()
        },
        preg_quote: function( str ) {
            // http://kevin.vanzonneveld.net
            // +   original by: booeyOH
            // +   improved by: Ates Goral (http://magnetiq.com)
            // +   improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
            // +   bugfixed by: Onno Marsman
            // *     example 1: preg_quote("$40");
            // *     returns 1: '\$40'
            // *     example 2: preg_quote("*RRRING* Hello?");
            // *     returns 2: '\*RRRING\* Hello\?'
            // *     example 3: preg_quote("\\.+*?[^]$(){}=!<>|:");
            // *     returns 3: '\\\.\+\*\?\[\^\]\$\(\)\{\}\=\!\<\>\|\:'

            return (str+'').replace(/([\\\.\+\*\?\[\^\]\$\(\)\{\}\=\!\<\>\|\:])/g, "\\$1");
        },
        highlight: function(needle, haystack) {
            return haystack.replace(
                new RegExp('(' + this.preg_quote(needle) + ')', 'ig'),
                '<span class="highlight">$1</span>'
            )
        },
        paginationConfig: function(componentName) {
            if (componentName == 'vuetable-pagination-dropdown') {
                this.$broadcast('vuetable-pagination:set-options', {
                    wrapperClass: 'form-inline',
                    icons: { prev: 'glyphicon glyphicon-chevron-left', next: 'glyphicon glyphicon-chevron-right' },
                    dropdownClass: 'form-control'
                });
            }
        }                 
    },
    events: {
        'vuetable:row-changed': function(data) {
        },
        'vuetable:row-clicked': function(data, event) {
        },
        'vuetable:cell-dblclicked': function(item, field, event) {
            this.$editable(event, function(value){
                item = JSON.stringify(item);
                var data = JSON.parse(item);  
                data._token = token;
                data[field.name] = value;
                vm.sendData(vm.url.update + data.id, 'PATCH', data).then(
                function (response) {                    
                    event.target.setAttribute("style", "background-color: #f5f5f5");
                }, function (response) {
                    vm.flashMessage = vm.defaultErrorMessage;
                    vm.flashType = vm.flashTypeDanger;
                    if (response.data.errors) {
                        vm.updateErrors(response.data.errors);
                    }
                    vm.modal('INFO');
                    event.target.setAttribute("style", "background-color: red");
                    event.target.setAttribute("title", response.data.errors[field.name]);
                });             
            });
         },
        'vuetable:action': function(action, data) {
            this.cleanData();
            //console.log('Data: ' + data.name              + ' | Action: ' + action);
            //console.log('Data: ' + JSON.stringify(data));
            var size = action.split(':').length;
            // console.log('SIZE: ' + size);
            if (size > 1) {
                var actions = action.split(':');
                action      = actions[0];
                var related = null;
                if (actions[1] == 'related')
                    related = actions[2];

                if (action == 'LINK') {
                    document.location = this.url.foreign[related].index.url + data.id; 
                } else {
                    var modal = related + action;
                    //console.log('--------------------- ID: ' + data.id);
                    this.modal(modal);
                    var url = null;
                    if (action == 'SHOW' || action == 'EDIT' || action == 'DELETE') {
                        this.row[related].id = data.id;
                        url = this.url.foreign[related].show.url + this.row.id + '/' + data.id;
                        this.getData(url);
                    } else if (action == 'ADD') {
                        this.row.name = data.name;
                        this.row.id   = data.id;
                    }   
                    //console.log('URL: ' + url );
                }
            } else {
                this.row.id = data.id;
                this.getData();
                if (action == 'view-item') {
                    this.modal('SHOW');
                } else if (action == 'edit-item') {
                    this.modal('PATCH');                
                } else if (action == 'delete-item') {
                    this.modal('DELETE');
                }
            }
        },
        'vuetable:load-success': function(response) {
            var data = response.data.data;
            //onLoadSuccess(data, this.highlight, this.searchFor);
        },
        'vuetable:load-error': function(response) {
            if (response.status == 400) {
                alert(response.data.message)
            } else {
                alert(E_SERVER_ERROR)
            }
        }
    }
});