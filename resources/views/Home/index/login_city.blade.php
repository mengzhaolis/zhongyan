<select class="second">
    @foreach($city as $city)
        <option value="{{$city->id}}" class="city_id" >{{$city->city_name}}</option>
    @endforeach
</select>