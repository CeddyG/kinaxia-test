@extends('admin/dashboard')



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
                        {!! BootForm::open()->action( route('admin.clients.update', $oItem->id) )->put() !!}
                        {!! BootForm::bind($oItem) !!}
                    @else
                        {!! BootForm::open()->action( route('admin.clients.store') )->post() !!}
                    @endif

                        {!! BootForm::text(__('clients.name'), 'name') !!}
                        {!! BootForm::text(__('clients.address'), 'address') !!}
                        {!! BootForm::text(__('clients.country'), 'country') !!}

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

