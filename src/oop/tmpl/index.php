<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>OOP Homework</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1 class="mt-2 ta-center text-center">OOP Homework</h1>
        <div class="row">
            <div class="col-md-4">
                <h4>Request::all()</h4>
                <p>Returns all $_GET + $_POST parameters in the associative array. If $only is not empty - return only keys from $only parameter.</p>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Key</th>
                            <th scope="col">Value</th>
                        </tr>
                    </thead>
                    <?= OOP\Services\ParametersWriter::writeAll($request->all()) ?>
                </table>
                <h4>Request::all(["email", "name"])</h4>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Key</th>
                        <th scope="col">Value</th>
                    </tr>
                    </thead>
                    <?= OOP\Services\ParametersWriter::writeAll($request->all(['email', 'name'])) ?>
                </table>
                <h4>Request::query("name")</h4>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Key</th>
                        <th scope="col">Value</th>
                    </tr>
                    </thead>
                    <?= OOP\Services\ParametersWriter::writeParam('name', $request->query('name', 'no value')) ?>
                </table>
            </div>
            <div class="col-md-4">
                <h4>POST form:</h4>
                <p>Stores your data in session or cookies.</p>
                <p>Demonstrates using of Session::set() and Cookies::set()</p>
                <p>After submitting, form inputs are filling by requested values using Request::post() </p>
                <?php
                    if (isset($postForm)) {
                        $postForm->showForm();
                    } else {
                        echo '<div class="alert alert-warning" role="alert">
                                  Form not implemented!
                              </div>';
                    }
                ?>

                <h4>GET form:</h4>
                <p>Unset session or cookie or both parameters using Session::remove() and Cookies::remove()</p>
                <p>After submitting, form inputs are filling by requested values using Request::query() </p>
                <?php
                    if (isset($getForm)) {
                        $getForm->showForm();
                     } else {
                        echo '<div class="alert alert-warning" role="alert">
                            Form not implemented!
                        </div>';
                    }
                ?>
            </div>
            <div class="col-md-4">
                <h4>User information</h4>
                <h5>From server:</h5>
                <ul>
                    <li>IP: <?= $request->ip() ?></li>
                    <li>Browser: <?= $request->userAgent() ?></li>
                </ul>
                <h4>Session::all()</h4>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Key</th>
                        <th scope="col">Value</th>
                    </tr>
                    </thead>
                    <?= OOP\Services\ParametersWriter::writeAll($request->session()->all()) ?>
                </table>
                <h4>Cookies::all()</h4>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Key</th>
                        <th scope="col">Value</th>
                    </tr>
                    </thead>
                    <?= OOP\Services\ParametersWriter::writeAll($request->cookies()->all()) ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>

