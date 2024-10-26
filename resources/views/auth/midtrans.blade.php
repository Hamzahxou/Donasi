<!DOCTYPE html>
<html>

<head>
    <title>Payment Page</title>
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('services.midtrans.clientKey') }}"></script>
</head>

<body>
    <button id="pay-button">Pay!</button>

    <script type="text/javascript">
        document.getElementById('pay-button').onclick = function() {
            fetch('/midtrans/get-snap-token', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    body: JSON.stringify({})
                })
                .then(response => response.json())
                .then(data => {
                    if (data.snap_token) {
                        snap.pay(data.snap_token);
                    } else {
                        alert('Error getting Snap token');
                    }
                });
        };
    </script>
</body>

</html>
