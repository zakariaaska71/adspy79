@if(Session::has('success'))
    <div class="row mr-2 ml-2">

            <button type="text" class="btn btn-lg btn-block btn-outline-success mb-2"
                    id="type-error">{{Session::get('success')}}
            </button>
    </div>
@endif
@if(Session::has('error'))
<div class="alert alert-danger" style="background: #f5d6d6;">
        <ul style="text-align: center">
         {{-- @foreach ($errors->all() as $error) --}}
          <li>{{Session::get('error')}}</li>
         {{-- @endforeach --}}
        </ul>
       </div>
@endif