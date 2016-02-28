@if (Session::has('flash_notifications'))
    {!! Form::input('hidden', 'notifications', json_encode(Session::get('flash_notifications'))) !!}

    <script type="text/javascript" src="{!! elixir('js/flash.min.js') !!}"></script>
@endif
