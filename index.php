<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Test Task</title>
    <script>
        $(document).ready(function() {
            $("#form").submit(function(e) {
                e.preventDefault()
                $.ajax({
                    type: "POST",
                    url: "signup.php",
                    data: $(this).serialize(),
                    success: function(response) {
                        const jsonData = JSON.parse(response)
                        if (jsonData.success === "1") {
                            $("#modal").addClass("d-none")
                            $("#success-message").removeClass("d-none")
                            $("#success-message").addClass("d-block")
                        } else {
                            $("#error-message").html(jsonData.error)
                        }
                    }
                })
            })
        })
    </script>
</head>

<body class="bg-body-secondary">
    <div class="modal modal-sheet d-block p-4 py-md-5 d-flex justify-content-center align-items-center" tabindex="-1" role="dialog" id="modalSignin">
        <div class="modal-dialog" role="document" id="modal">
            <div class="modal-content rounded-4 shadow">
                <h1 class="modal-header p-5 pb-4 border-bottom-0 fw-bold mb-0 fs-2">Sign up</h1>
                <div class="modal-body p-5 pt-0">
                    <form action="signup.php" id="form" method="POST">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control rounded-3" id="first-name" name="first-name" placeholder="John">
                            <label for="first-name">First name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control rounded-3" id="last-name" name="last-name" placeholder="Doe">
                            <label for="last-name">Last name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control rounded-3" id="email" name="email" placeholder="name@example.com">
                            <label for="email">Email address</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control rounded-3" id="password" name="password" placeholder="Password">
                            <label for="password">Password</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control rounded-3" id="password-repeat" name="password-repeat" placeholder="Repeat your password">
                            <label for="password-repeat">Repeat your password</label>
                        </div>
                        <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" type="submit" id="submit" name="submit">Sign up</button>
                        <p class="text-body-secondary">By clicking Sign up, you agree to the terms of use.</p>
                        <p class="text-danger" id="error-message"></p>
                    </form>
                </div>
            </div>
        </div>
        <h3 class="d-none text-success" id="success-message">Registration successful!</h3>
    </div>
</body>

</html>