@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.call.actions.edit', ['name' => $call->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <call-form
                :action="'{{ $call->resource_url }}'"
                :call_type="{{ $tipo_llamado->toJson() }}"
                :cargo="{{ $cargo->toJson() }}"
                :institucion="{{ $institucion->toJson() }}"
                :data="{{ $call->toJson() }}"
                v-cloak
                inline-template>

                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.call.actions.edit', ['name' => $call->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.call.components.form-elements')
                        @include('brackets/admin-ui::admin.includes.media-uploader', [
                            'mediaCollection' => app(App\Models\Call::class)->getMediaCollection('gallery'),
                            'media' => $call->getThumbs200ForCollection('gallery'),
                            'label' => 'Documentos Adjuntos'
                        ])
                    </div>


                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>

                </form>

        </call-form>

        </div>

</div>

@endsection
