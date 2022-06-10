import AppForm from '../app-components/Form/AppForm';

Vue.component('sport-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                sport:  '' ,
                description:  '' ,
                image:  '' ,
                
            }
        }
    }

});