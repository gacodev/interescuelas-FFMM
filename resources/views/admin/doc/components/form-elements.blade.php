<div class="form-group row align-items-center" :class="{'has-danger': errors.has('doc_type'), 'has-success': fields.doc_type && fields.doc_type.valid }">
    <label for="doc_type" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.doc.columns.doc_type') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.doc_type" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('doc_type'), 'form-control-success': fields.doc_type && fields.doc_type.valid}" id="doc_type" name="doc_type" placeholder="{{ trans('admin.doc.columns.doc_type') }}">
        <div v-if="errors.has('doc_type')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('doc_type') }}</div>
    </div>
</div>


