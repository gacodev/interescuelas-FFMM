import AppForm from '../app-components/Form/AppForm';

Vue.component('competence-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                sport_id:  '' ,
                categorie_id:  '' ,
                quantity_of_participants:  '' ,
                
            }
        }
    }

});