<html>
<head>


</head>

<body>

<form method="post" action="{{route('gym.membership')}}" enctype="multipart/form-data">
    @csrf
    <label>First Name:</label><br>
    <input name="first_name" type="text"><br>
    <label>Last Name:</label><br>
    <input name="last_name" type="text"><br>
    <label>Birthdate:</label><br>
    <input name="birthdate" type="date"><br>
    <label>Expire Date:</label><br>
    <input name="expireDate" type="date"><br>
    <label>Profile Picture:</label><br>
    <input type="file" name="profile_picture" /><br><br>
    <input type="submit"/>
</form>
</body>
</html>
