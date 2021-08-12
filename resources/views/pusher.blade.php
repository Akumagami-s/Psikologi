<!DOCTYPE html>
<head>
    <title>Pusher Test</title>
    <script src="https://js.pusher.com/3.2/pusher.min.js"></script>
    <script>

        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('e5bbf707214a6223d044', {
            cluster: 'ap1',
            encrypted: true
        });

        var channel = pusher.subscribe('test_channel');
        channel.bind('pusher:subscription_succeeded', function(members) {
    alert('successfully subscribed!');
});

    </script>
</head>