@foreach($type as $type)
    <select class="type_hang">
        <option value="{{$type->id}}">{{$type->diaoyan_type}}</option>
    </select>
@endforeach