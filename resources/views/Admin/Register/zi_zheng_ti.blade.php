<div class="modal-body">
	@foreach($people as $peoples)
		<div class="radio-box">
			<input name="sex" type="radio" class="sex" value="{{$peoples->id}}">
			<label for="sex-1">{{$peoples->name}}</label>
		</div>
	@endforeach
</div>
			