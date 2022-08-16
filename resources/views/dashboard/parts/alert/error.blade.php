@if (count($errors) > 0)
<div class="alert alert-danger" style="background: #f5d6d6;">
 <ul style="text-align: center">
  @foreach ($errors->all() as $error)
   <li>{{ $error }}</li>
  @endforeach
 </ul>
</div>
@endif