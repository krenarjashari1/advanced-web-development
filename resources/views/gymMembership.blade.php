

@section('content')
    <table border="1">

        @component('components.tablerow')
            @slot('rowColor', 'green')
            @slot('attributeName','First Name')
            @slot('value')
                <input type="text" name="first_name"><br>
            @endslot <br>
        @endcomponent
        @component('components.tablerow')
            @slot('rowColor', 'green')
            @slot('attributeName','Last Name')
            @slot('value')
                <input type="text" name="last_name" ><br><br>
            @endslot
            @endcomponent

            @component('components.tablerow')
                @slot('rowColor', 'blue')
                @slot('attributeName', "Birthdate")
                @slot('value')
                    <input type="date">
                @endslot
            @endcomponent
            @component('components.tablerow')
                @slot('rowColor', 'blue')
                @slot('attributeName', "Expire Date")
                @slot('value')
                    <input type="text" class="ccFormatMonitor" placeholder="Card Number">

                    <input type="text" id="inputExpDate" placeholder="MM / YY" maxlength='7'>

                    <input type="password" class="cvv" placeholder="CVV">
                @endslot
            @endcomponent

        @component('components.tablerow')
            @slot('rowColor', 'green')
            @slot('attributeName','Profile Picture')
            @slot('value')
                @if($gymMember->getProfilePicture() != null)
                    <img width=100
                         src='{{url(str_replace("public/", 'storage/', $gymMember->getProfilePicture()))}}'>
                @else
                    <form method="POST" enctype="multipart/form-data" action="{{route('add.profile.picture', $gymMember->getId())}}">
                        @method('PUT')
                        @csrf
                        <input type="file" name="profile_picture">
                        <button>Add Profile Picture</button>
                    </form>
                @endif
            @endslot
        @endcomponent

            @component('components.tablerow')
                @slot('rowColor', 'green')
                @slot('attributeName','Add Member')
                @slot('value')
                    <button type="button">Save</button>
                @endslot
            @endcomponent

            @component('components.tablerow')









{{--            @slot('attributeName', 'Actions')--}}
{{--            @slot('value')--}}
{{--                <form onsubmit="return confirm('Are your sure to delete this student?');"--}}
{{--                      method="POST" action="{{route('delete.student', $gymMember->getId())}}">--}}
{{--                    @method('DELETE')--}}
{{--                    @csrf--}}
{{--                    <button>DELETE</button>--}}
{{--                </form>--}}
{{--            @endslot--}}
{{--        @endcomponent--}}
    </table>



@endsection









