<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test Post Axios</title>

    <h1 id="infoStatus">This is test post!</h1>

    <script>
        const infoStatus = document.getElementById('infoStatus');
        const data = new FormData();

        data.append('message' ,'msg');

        data.append('_token' ,'{{ csrf_token() }}');

        console.log(data);
        // axios.post('/testPost', data);

        async function sendData(data) {
            return await fetch('/testPost', {
                method: 'POST',
                headers: { 'Content-Type': 'multipart/form-data' },
                body: data,
            })
        }

        sendData(data);

    </script>
</head>
<body>

</body>
</html>
