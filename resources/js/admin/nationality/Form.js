import AppForm from '../app-components/Form/AppForm';

Vue.component('nationality-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                nationality:  '' ,
                flag_image:  '' ,
                
            }
        }
    }

});