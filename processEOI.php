<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./styles/style.css">
    <title>Result from the apply form</title>
</head> 
<style>
*{
    margin: 0;
    padding: 0;
}
.background{
    background-color:#e6dcce;
}
.table-box{
    margin: 50px auto;
}
.table-header{
    text-align:center;
}
.table-row{
    display: table;
    width:80%;
    margin: 10px auto;
    font-family: sans-serif;
    background: transparent;
    padding: 12px 0;
    color: #555;
    font-size: 13px;
    box-shadow: 0 1px 4px 0 rgba(0,0,50,0.3);
}
.table-cell{
    display: table-cell;
    width: 30%;
    text-align: center;
    padding: 4px 0;
    border-right: 1px solid #d6d4d4;
    vertical-align: middle;
}
.table-head{
    background: #8665f7;
    box-shadow:none;
    color:#fff;
    font-weight:600;
}
.last-cell{
    border-right:none;
}
.table-head .table-cell{
    border-right:none;
}
</style>
<body class="background">
    <div class="table-box">
    <div class="table-header">
        <h2>Information results from the Application form</h2>
    </div>
    <div class="table-row table-head">
        <div class="table-cell">
            <p>Firstname</p>
        </div>
        <div class="table-cell">
            <p>Lastname</p>
        </div>
        <div class="table-cell last-cell">
            <p>Dob</p>
        </div>
    </div>

    <div class="table-row">
        <div class="table-cell">
            <p>Firstname</p>
        </div>
        <div class="table-cell">
            <p>Lastname</p>
        </div>
        <div class="table-cell last-cell">
            <p>Dob</p>
        </div>
    </div>
</body>
</html>