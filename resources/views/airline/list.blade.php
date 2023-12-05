@foreach ($airlines as $airline)
    <form action="/api/airline/{{$airline->airline_id}}" method="post">
        {{csrf_field()}}
        {{method_field('GET')}}
        <input type="submit" value="{{$airline->name}}">
    </form>
@endforeach