<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration Form</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        body {
            background-color: #e8f4fb;
        }
        table {
            width: 100%;
            background-color: #b4d9f5;
            border-collapse: collapse;
        }
        td {
            padding: 12px;
            border: 1px solid white;
        }
        .title-row {
            background-color: #99c9ef;
            font-weight: bold;
            font-size: 20px;
            text-align: center;
            border: 1px solid white;
            padding: 15px;
        }
        .submit-row {
            background-color: #99c9ef;
            text-align: center;
            padding: 15px;
        }
    </style>
</head>

<body>

<div class="container mt-4" style="max-width: 700px;">

    <table>
        <tr>
            <td colspan="2" class="title-row">Registration Form</td>
        </tr>

        <form method="post">

        <tr>
            <td style="width: 35%;">Username</td>
            <td><input type="text" class="form-control" name="username"></td>
        </tr>

        <tr>
            <td>Password</td>
            <td><input type="password" class="form-control" name="password"></td>
        </tr>

        <tr>
            <td>User Type</td>
            <td>
                <select class="form-select" name="usertype">
                    <option>Member</option>
                    <option>Admin</option>
                    <option>Guest</option>
                </select>
            </td>
        </tr>

        <tr>
            <td>Display Name</td>
            <td><input type="text" class="form-control" name="displayname"></td>
        </tr>

        <tr>
            <td>Address</td>
            <td><textarea class="form-control" rows="3" name="address"></textarea></td>
        </tr>

        <tr>
            <td>Email</td>
            <td><input type="email" class="form-control" name="email"></td>
        </tr>

        <tr>
            <td>Gender</td>
            <td>
                <input type="radio" name="gender" value="Male"> Male
                <input type="radio" name="gender" value="Female" class="ms-3"> Female
            </td>
        </tr>

        <tr>
            <td></td>
            <td>
                <input type="checkbox" name="terms"> I accept Terms and Conditions
            </td>
        </tr>

        <tr>
            <td colspan="2" class="submit-row">
                <button class="btn btn-light px-4">Submit</button>
            </td>
        </tr>

        </form>

    </table>

</div>

</body>
</html>
