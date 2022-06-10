import AppForm from '../app-components/Form/AppForm';

Vue.component('award-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                award:  '' ,
                description:  '' ,
                image:  '' ,
                
            }
        }
    }

});