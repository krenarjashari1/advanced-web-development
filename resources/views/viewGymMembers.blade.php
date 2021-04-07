<a href="{{route('addGymMember')}}">Add a new Member</a>
<table border="1">

    <?php $gymMembersModel = new \App\Models\GymMembership();
    $gymMembers = $gymMembersModel::all();
    ?>

    @foreach($gymMembers as $gymMember)

    @component('components.tablerow')
    @slot('id',$gymMember->getId())
     @slot('first_name',$gymMember->getFirstName())

                @slot('last_name',$gymMember->getLastName())
                @slot('birthdate',$gymMember->getBirthdate())
                @slot('expireDate',$gymMember->getExpireDate())



            @endcomponent




        @endforeach










</table>
