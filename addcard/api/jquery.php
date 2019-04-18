<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("h1").click(function(){
        $(this).hide();
    });

});

$(document).ready(function(){
    $("h2").click(function(){
        $(this).show();
    });

});
</script>
</head>
<body>
<h1> if u click me i will disappear </h1>
<h2> if u click me i will show on screen </h2>
</body>
<html>