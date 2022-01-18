<!DOCTYPE html>
<html>
<head>
    <title>{{ $details['type'] }} - {{ $details['name'] }}</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('public/stylesheets/theme.min.css') }}">
    <style type="text/css" media="screen">
        .font-large {font-size: larger;}
    </style>
</head>
<body>
    <h4>Hi Super Admin,</h4>
    <p>
    	<strong>Name:</strong> {{ $details['name'] }}<br/>
        <strong>Email:</strong> {{ $details['email'] }}<br/>
        <strong>Type:</strong> {{ $details['type'] }}<br/>
        <strong>Body:</strong> {{ $details['body'] }}<br/>
    </p>
    <p>
    	- Regarding <a href="{{ route('home') }}" title="">BoinawTeam</a>
    </p>

</body>
</html>