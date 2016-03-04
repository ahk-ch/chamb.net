@if (Session::has('flash_notifications'))
    <script type="text/javascript">
        function pnotifyMessage(notification) {
            new PNotify({
                title: notification.level === 'error' ? 'Error' : 'Info',
                text: notification.message,
                type: notification.level,
                animation: "slide",
                animate_speed: "slow",
                hide: 'true',
                shadow: 'true',
                delay: 3000,
                mouse_reset: true
            });
        }

        $(function () {
            PNotify.prototype.options.styling = "fontawesome";

            var notifications;

            {!! 'notifications = ' . json_encode(Session::get('flash_notifications')) !!};

            for (var index in notifications) {
                new pnotifyMessage(notifications[index]);
            }
        });
    </script>
@endif

