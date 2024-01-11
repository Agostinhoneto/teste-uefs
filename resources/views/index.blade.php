<!-- index.html -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>API Dashboard</title>
</head>
<body>

<div class="container mt-5">
    <h1 class="mb-4">API Teste</h1>

    <div class="row">
        <div class="col-md-6">
            <h2>Usuários</h2>
            <ul id="userList" class="list-group"></ul>
        </div>

        <div class="col-md-6">
            <h2>Postagens</h2>
            <ul id="postList" class="list-group"></ul>
        </div>
    </div>
</div>

<!-- Incluindo o jQuery e o Axios para fazer as requisições à API -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<!-- Seu script personalizado para consumir a API e preencher os dados -->
<script src="app.js"></script>

</body>
</html>
