<form action="/api/airline" method="post">
    {{csrf_field()}}
    <input type="text" name="name" placeholder="Airline name">
    <input type="text" name="country" placeholder="Country name">
    <input type="submit" value="Ok">
</form>