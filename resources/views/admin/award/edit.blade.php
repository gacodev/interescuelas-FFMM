@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.award.actions.edit', ['name' => $award->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <award-form
                :action="'{{ $award->resource_url }}'"
                :data="{{ $award->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.award.actions.edit', ['name' => $award->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.award.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </award-form>

        </div>
    
</div>

@endsection