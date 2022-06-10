import AppForm from '../app-components/Form/AppForm';

Vue.component('score-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                
            }
        }
    }

});