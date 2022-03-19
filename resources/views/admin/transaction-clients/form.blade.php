@extends('admin/dashboard')

@section('CSS')
    <!-- Datepicker -->
    {!! Html::style('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') !!}
    <!-- Select 2 -->
    {!! Html::style('bower_components/select2/dist/css/select2.min.css') !!}

    <style>
        .input-group-addon:hover
        {
            color: black;
        }
    </style>
@stop

@section('content')
    <div class="row">
        <div class="col-sm-6">
            <br>
            <div class="box box-info">	
                <div class="box-header with-border">
                    @if(isset($oItem))
                        <h3 class="box-title">Modification</h3>
                    @else
                        <h3 class="box-title">Ajouter</h3>
                    @endif
                </div>
                <div class="box-body"> 
                    @if(isset($oItem))
                        {!! BootForm::open()->action( route('admin.transaction-clients.update', $oItem->id) )->put() !!}
                        {!! BootForm::bind($oItem) !!}
                    @else
                        {!! BootForm::open()->action( route('admin.transaction-clients.store') )->post() !!}
                    @endif

                        
                        @if(isset($oItem))
                            {!! BootForm::select(trans('companies.companies'), 'company_id')
                                ->class('select2 form-control')
                                ->options([$oItem->company_id => $oItem->companies->name])
                                ->data([
                                    'url-select'    => route('api.admin.companies.select'), 
                                    'url-create'    => route('admin.companies.create'),
                                    'field'         => 'name'
                            ]) !!}
                        @else
                            {!! BootForm::select(trans('companies.companies'), 'company_id')
                                ->class('select2 form-control')
                                ->data([
                                    'url-select'    => route('api.admin.companies.select'), 
                                    'url-create'    => route('admin.companies.create'),
                                    'field'         => 'name'
                            ]) !!}
                        @endif

                        
                        @if(isset($oItem))
                            {!! BootForm::select(trans('clients.clients'), 'client_id')
                                ->class('select2 form-control')
                                ->options([$oItem->client_id => $oItem->clients->name])
                                ->data([
                                    'url-select'    => route('api.admin.clients.select'), 
                                    'url-create'    => route('admin.clients.create'),
                                    'field'         => 'name'
                            ]) !!}
                        @else
                            {!! BootForm::select(trans('clients.clients'), 'client_id')
                                ->class('select2 form-control')
                                ->data([
                                    'url-select'    => route('api.admin.clients.select'), 
                                    'url-create'    => route('admin.clients.create'),
                                    'field'         => 'name'
                            ]) !!}
                        @endif

                        
                        @if(isset($oItem))
                            {!! BootForm::select(trans('products.products'), 'product_id')
                                ->class('select2 form-control')
                                ->options([$oItem->product_id => $oItem->products->name])
                                ->data([
                                    'url-select'    => route('api.admin.products.select'), 
                                    'url-create'    => route('admin.products.create'),
                                    'field'         => 'name'
                            ]) !!}
                        @else
                            {!! BootForm::select(trans('products.products'), 'product_id')
                                ->class('select2 form-control')
                                ->data([
                                    'url-select'    => route('api.admin.products.select'), 
                                    'url-create'    => route('admin.products.create'),
                                    'field'         => 'name'
                            ]) !!}
                        @endif

                        
                        @if(isset($oItem))
                            {!! BootForm::select(trans('employees.employees'), 'employee_id')
                                ->class('select2 form-control')
                                ->options([$oItem->employee_id => $oItem->employees->name])
                                ->data([
                                    'url-select'    => route('api.admin.employees.select'), 
                                    'url-create'    => route('admin.employees.create'),
                                    'field'         => 'name'
                            ]) !!}
                        @else
                            {!! BootForm::select(trans('employees.employees'), 'employee_id')
                                ->class('select2 form-control')
                                ->data([
                                    'url-select'    => route('api.admin.employees.select'), 
                                    'url-create'    => route('admin.employees.create'),
                                    'field'         => 'name'
                            ]) !!}
                        @endif

                        {!! BootForm::text(__('transaction-clients.quantity'), 'quantity') !!}

                    {!! BootForm::submit('Envoyer', 'btn-primary')->addClass('pull-right') !!}

                    {!! BootForm::close() !!}
                </div>
            </div>
            <a href="javascript:history.back()" class="btn btn-primary">
                <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
            </a>
        </div>
    </div>
@stop

@section('JS')
    {!! Html::script('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') !!}
    
    <script>
        $(document).ready(function() {
            $('.date-picker-input').datepicker({
                format: 'dd/mm/yyyy',
                autoclose: true,
                todayHighlight: true,
                language: 'fr'
            });
        });
    </script>    

    <!-- Select 2 -->
    {!! Html::script('bower_components/select2/dist/js/select2.full.min.js') !!}
    
    <script>
        $(document).ready(function() {
            $('.select2').wrap('<div class="input-group input-group-select2"></div>');
            $( ".input-group-select2" ).each(function () {
                var url = $(this).find('.select2').attr(('data-url-create'));
                $(this).prepend('<a href="'+ url +'" target="_blank" class="input-group-addon"><i class="glyphicon glyphicon-plus"></i></a>');
            });
            
            $('.select2').select2({
                ajax: {
                    url: function () {
                        return $(this).attr('data-url-select');
                    },
                    headers: {
                        "Authorization": "Bearer {{ Sentinel::getUser()->api_token }}"
                    },
                    dataType: 'json',
                    delay: 10,
                    data: function (params) {
                        return {
                            q: params.term, // search term
                            field: $(this).attr('data-field'),
                            page: params.page
                        };
                    },
                    processResults: function (data, params) {
                        // parse the results into the format expected by Select2.
                        // since we are using custom formatting functions we do not need to
                        // alter the remote JSON data
                        params.page = params.page || 1;
                
                        return {
                            results: data.items,
                            pagination: {
                                more: (params.page * 30) < data.total_count 
                }
                        };
                    },
                    cache: true
                },
                them: 'bootstrap'
            });
        } );
    </script> 

@stop