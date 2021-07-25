<form action="{{ route("getHomePage") }}" method="GET" class="d-flex mb-3">
    <input class="form-control me-sm-2" name="search" type="text" value="{{ ($search) ?: '' }}" placeholder="Search">
    <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
</form>
