<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/css/admin.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-6 offset-3">
                <div class="card">
                    <div class="card-body">
                        <h1>Войти</h1>
                        <form id="login-form" action="/login" method="post">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label">Почта</label>
                                <input type="email" name="email" id="email-input" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Пароль</label>
                                <input type="text" name="password" id="password-input" class="form-control" required>
                            </div>
                            <div>
                                <button class="btn btn-success" type="submit">
                                    Войти
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // const name = document.getElementById('name-input');
        // const password = document.getElementById('password-input');
        // const form = document.getElementById('login-form');
    
        // form.addEventListener('submit', function (e) {
        //     e.preventDefault();
        // });
    </script>
</body>
</html>