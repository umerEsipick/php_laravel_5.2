<html>
    <head>
        <title>Email verification</title>
    </head>
    <body>
        
    <h5>Verify Email</h5>

        <div>
            <p>Please click the link below</p>
            
            <a href="{{ url('mail/confirm/'.$email) }}">Click</a>
        </div>

    </body>
</html>