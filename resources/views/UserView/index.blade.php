@extends('layouts.app')

@section('admin')

    <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">No.</th>
            <th scope="col">list</th>
            <th scope="col">Admin</th>
            <th scope="col"></th>
            {{-- <th scope="col">Last</th>
            <th scope="col">Handle</th> --}}
          </tr>
        </thead>
        @foreach ($users as $user)
        <tbody>
          <tr>
            <th scope="row">
                {{ $user->id }}
            </th>
            <td>
              {{ $user->name }} 
                @if($user->is_admin == 1)
                  (admin)
                @endif
            </td>
            <td>
              <a class="btn btn-primary" data-toggle="modal" data-target="#exampleModal2" 
                data-action="{{ route('users.update',['user' => $user]) }}"
                  data-admin="{{ $user->is_admin === 1 ? 'on':'off'}}">
                  Change
              </a>
              {{-- data-action="{{ route('users.update', ['user' => $user]) }}"  --}}
            </td>
            <td> 
              @if($user->posts->count() !== 0)
              <button class="btn btn-danger" type="submit" disabled>Delete</button>
              @elseif($user->is_admin == 1)
                <button class="btn btn-danger" type="submit" disabled>Delete</button>
              @else
                <form action="/users/{{ $user->id }}" method="POST">
                    @method('DELETE')
                        <button class="btn btn-danger" type="submit">Delete</button>
                </form>
              @endif
            </td>
          </tr>
        </tbody>
        
        @endforeach
      </table>

      <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModal2Label" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-body">

                <form id="upUser" action="" method="POST">
                    @method('PATCH')

                      <div class="custom-control custom-switch" >
                        <input type="checkbox" class="custom-control-input" id="customSwitch1" name="upuser">
                        <label class="custom-control-label" for="customSwitch1">Change is admin</label>
                      </div>
                    

                    <div class="modal-footer">
                      <button class="btn btn-primary btn-sm" type="submit">Save</button>
                    </div>
                </form>
            </div>
           </div>
          </div>
        </div>

@endsection
@section('script')
<script>
  $( document ).ready(function() {
    $('#exampleModal2').on('show.bs.modal', function (event){
      var button = $(event.relatedTarget)
      var action = button.data('action')
      var admin =  button.data('admin')
      // console.log(text)
      $('#upUser').attr('action', action );

      $('#customSwitch1').prop('checked', admin === "on")
    });
  });
</script>
@endsection
