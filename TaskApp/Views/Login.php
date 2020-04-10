<form action="" method="post">
    <table class="login">
        <tr>
            <th colspan="2">Authorization</th>
        </tr>
        <tr>
            <td>Login</td>
            <td><input type="text" name="login" class="form-control mb-2 mt-2"></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="password" name="password" class="form-control mb-2"></td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" value="Enter" name="btn" class="btn btn-info">
                <input type="button" onclick="document.location='/main/';" value="Back" name="btn" class="btn btn-warning">
            </td>
        </tr>
    </table>
</form>
<p class="text-danger mt-3">
<?php

if(isset($_POST['btn'])){
    echo $data['login_status'] == 'bad' ? 'Error: incorrect login/password' : 'Error: login/password must be set';
}
?>
</p>