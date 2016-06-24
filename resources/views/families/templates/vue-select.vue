<template>
  <div id="select">
    <v-select :value.sync="selected" :options="options"></v-select>
  </div>
</template>

<script>    
    import VueSelect from "vue-select"
    export default {
        components: {VueSelect},
        data() {
            return {
            selected: null,
            options: null,
            methods: {
              getOptions() {
                loading(true);
                this
                    .$http({url: apiUrl.index, method: 'GET', data: data})
                    .then(this.success, this.failed);
                },   
                success: function(response) {
                    if (response.data.data) {
                        var data = response.data.data;
                        this.$set('options', data);
                    }
                    //var message = response.data.message;
                    //vm.flashMessage = message;
                    //vm.flashType = 'success';
                },
                failed: function(response) {
                    vm.flashMessage = vm.defaultErrorMessage;
                    vm.flashType = vm.flashTypeDanger;
                    if (response.data.errors) {
                        vm.updateErrors(response.data.errors);
                    }
                },          
            }            
          }
        }
    }
</script>         