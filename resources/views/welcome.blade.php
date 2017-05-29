<!DOCTYPE html>
<html>
<head>
    <title>Invoice List</title>
    <link rel="stylesheet" type="text/css" href="../public/css/bulma-docs.css">
</head>
<body>
<div class="container">
<div class="field "></div>
    <p class="control">
        <input type="text" class="input" name="searchinput" id="searchinput">
    </p>
    <p class="control">
        <input type="submit" name="search" id="search" value="Search">
    </p>
</div>
    <table class="table is-bordered is-stripped">
        <thead>
            <tr>
                <th>Invoice name</th>
                <th>#of items</th>
                <th>Total</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <a href="/" class="fa fa-user">Web development</a>
                </td>
                <td>3</td>
                <td>3000</td>
                <td><a href="#">PDF</a></td>
                <td><a href="#">Remove</a><button class="fa fa-homes"></button></td>
            </tr>
        </tbody>
    </table>
</body>
</html>
<script src="js/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#search').click(function() {

        });

        $("#search").keydown(function(e) {
            if(e.which == 13)
                $("#search").click();
        });
    })
</script>