import AppForm from '../app-components/Form/AppForm';

Vue.component('force-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                force:  '' ,
                description:  '' ,
                image:  '' ,
                
            }
        }
    }

});