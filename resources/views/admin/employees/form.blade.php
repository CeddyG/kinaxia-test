@extends('admin/dashboard')

@section('CSS')
    <!-- Datepicker -->
    {!! Html::style('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') !!}
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
                        {!! BootForm::open()->action( route('admin.employees.update', $oItem->id) )->put() !!}
                        {!! BootForm::bind($oItem) !!}
                    @else
                        {!! BootForm::open()->action( route('admin.employees.store') )->post() !!}
                    @endif

                        {!! BootForm::text(__('employees.name'), 'name') !!}
                        {!! BootForm::inputGroup(__('employees.birthday'), 'birthday')
                            ->type('text')
							->class('date-picker-input form-control')
                            ->beforeAddon('<i class="fa fa-calendar"></i>') !!}
                        {!! BootForm::text(__('employees.country'), 'country') !!}
                        {!! BootForm::inputGroup(__('employees.first_day'), 'first_day')
                            ->type('text')
							->class('date-picker-input form-control')
                            ->beforeAddon('<i class="fa fa-calendar"></i>') !!}

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

@stop