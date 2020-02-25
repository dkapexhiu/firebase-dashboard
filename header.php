<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Firebase CRUD</title>

    <!-- Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    <div class="container">
        <br>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">Firebase</a>
                </div>
                <div class="collapse navbar-collapse" id="nav">
                    <ul class="nav navbar-nav">
                        <li><a href="login.php">Member</a></li>
                        <button id="logout" class="btn btn-lg btn-warning" style="display:none;">Logout</button>
                    </ul>
                </div>
            </div>
        </nav>

<script>
                document.getElementById('logout').onclick = function () {
                    if (confirm('Logout?')) {
                        firebase.auth().signOut(); // This will trigger onAuthStateChanged again, immediately.
                        location.reload();
                        return false;
                    }
                };
</script>
