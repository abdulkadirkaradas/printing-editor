@extends('layouts.admin')
@section('content')

<div class="main-container" style="margin-left: 250px;" id="main-app">
    <main-app></main-app>
</div>

@endsection

@section('scripts')
@parent

<script src="{{ mix('js/app.js') }}"></script>
<script>
    $(document).ready(function(){
        const app = new Vue({
            el: '#main-app',
        });
    });
</script>

@endsection

@section('styles')
@parent

<style>
    @media (max-width: 991px) {
        .main-container {
            margin-left: 0 !important;
        }
    }
</style>

@endsection
