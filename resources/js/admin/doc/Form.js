import AppForm from '../app-components/Form/AppForm';

Vue.component('doc-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                doc_type:  '' ,
                
            }
        }
    }

});