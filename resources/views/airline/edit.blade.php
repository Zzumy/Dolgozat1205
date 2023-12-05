<form action="/api/airline/{{$airline->airline_id}}" method="post">
    {{csrf_field()}}
    {{method_field('PUT')}}
    <input type="text" name="name" placeholder="Airline name" value="{{$airline->name}}">
    <input type="text" name="country" placeholder="Airline country" value="{{$airline->country}}">
    <input type="submit" value="Ok">
</form>