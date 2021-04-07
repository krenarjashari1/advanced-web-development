<h1>Edit Gym Member</h1>

<form method="POST" action="/editGymMembers">

    @csrf


    <input type="text" name="id" value="{{$editData['id']}}">
    <input type="text" name="first_name" value="{{$editData['first_name']}}">
    <input type="text" name="last_name" value="{{$editData['last_name']}}">
    <input type="date" name="birthdate" value="{{$editData['birthdate']}}">
    <input type="date" name="expireDate" value="{{$editData['expireDate']}}">
    <input type="text" name="profile_picture" value="{{$editData['profile_picture']}}">

    <button type="submit">Edit</button>

</form>
