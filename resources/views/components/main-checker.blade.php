<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
    <title>Processing</title>
    <style>
    body,h1,h2,h3,h4,h5 {font-family: "Poppins", sans-serif}
    body {font-size:16px;}
    .w3-half img{margin-bottom:-6px;margin-top:16px;opacity:0.8;cursor:pointer}
    .w3-half img:hover{opacity:1}
    </style>
    </head>
    <h1>Processing...</h1>
    <script>
        function check() {
        var a = <?php echo json_encode($_POST['Name']) ?>;
        var b = <?php echo json_encode($_POST['Street_address']) ?>;
        var c = <?php echo json_encode($_POST['city']) ?>;
        var d = <?php echo json_encode($_POST['state']) ?>;
        var e = <?php echo json_encode($_POST['zip']) ?>;
        var f = <?php echo json_encode($_POST['phone']) ?> ;
        var g = <?php echo json_encode($_POST['email']) ?>;
        var h = <?php echo json_encode($_POST['service']) ?>;
        var i = <?php echo json_encode($_POST['message']) ?>;
        var message = 'Based on what you entered...\nYour name: '+ a + '\nAddress: ' 
        + b + '\n' + c + ', ' + d + ' ' + e +'\nPhone Number : ' + f + '\nEmail Address: ' +  g + '\nService:' 
        + h + '\nMessage Given: ' + i + '\nConfirm if correct. Cancel to fix/edit';
        
            if (confirm(message)) {
                
                window.location.href = 'checked.php';
        } else {
            window.history.back();
        }
        
        }
        </script>
    <body onload ="check()">
        
    <?php
    //for session
    session_start();
    $_SESSION['Name'] = $_POST['Name'];
    $_SESSION['Address'] = $_POST['Street_address'];
    $_SESSION['city'] = $_POST['city'];
    $_SESSION['state'] = $_POST['state'];
    $_SESSION['zip'] = $_POST['zip'];
    $_SESSION['phone'] = $_POST['phone'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['service'] = $_POST['service'];
    $_SESSION['message'] = $_POST['message'];
    
    
    ?>
    </body>
    