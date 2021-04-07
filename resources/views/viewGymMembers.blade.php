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
                @slot('delete')

                    <form method="POST" action="{{route('deleteGymMembers',$gymMember->getId())}}">

                        @method('DELETE')
                        @csrf

                        <button>Delete</button>
                    </form>
                @endslot

                  @slot('edit')

                      <form action="{{route('editGymMembers',$gymMember->getId())}}">

                          <button>Edit</button>
                      </form>

                      @endslot





            @endcomponent




        @endforeach










</table>
