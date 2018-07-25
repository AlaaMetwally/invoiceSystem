<?php
$i = '';
$j = '';
?>
@extends('admin.master')
@section('plugins_css')

@endsection
@section('plugins_js')

@endsection

@section('page_js')
    <script src="{{asset('assets/admin/pages/scripts/currency.js')}}" type="text/javascript" charset="UTF-8"></script>
    <script src="{{asset('assets/admin/pages/scripts/ajaxForms.js')}}" type="text/javascript" charset="UTF-8"></script>
@endsection


@section('add_inits')

@stop


@section('page_title_small')

@stop

@section('content')
    @include($partialView)
@stop