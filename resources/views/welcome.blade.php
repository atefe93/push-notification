<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
<script>
    navigator.serviceWorker.register('sw.js');

    async function subscribe() {
        let sw = await navigator.serviceWorker.ready;
        let push = await sw.pushManager.subscribe({

            userVisibleOnly:true,
            applicationServerKey:"BLeyRugFDhG8gUUdwsu8J4cPkgySzDJizp2BQ-eSJt7MjKDufz2NA0sI3QE0DG9WqfG5mIMIDX-DmkIU2Q_AAHg"

        });

        let xhr = new XMLHttpRequest()

        xhr.open('POST', '/api/admin/savepush', true)
        xhr.setRequestHeader('Content-type', 'application/json; charset=UTF-8')
        xhr.send(JSON.stringify(
            {
                "push": JSON.stringify(push)
            }

        ));

    }

    function enablenotif() {
        Notification.requestPermission().then(function (permission) {
            if (Notification.permission === 'granted') {
                subscribe()
            }
        });
    }


</script>
<button onClick="enablenotif()">enableNotif</button>
</body>

</html>
