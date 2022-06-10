import AppForm from '../app-components/Form/AppForm';

Vue.component('participant-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                number_id:  '' ,
                name:  '' ,
                email:  '' ,
                phone:  '' ,
                birthday:  '' ,
                doc_id:  '' ,
                force_id:  '' ,
                nationality_id:  '' ,
                
            }
        }
    }

});