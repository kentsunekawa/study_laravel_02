<body>
    <h1>Hello/Index</h1>
   <p>{{$msg}}</p>
    <div>
        <form action="/hello" method="post">
            @csrf
            ID: <input type="text" id="id" name="id">
            <input type="submit">
        </form>

    </div>
    <hr>
    <table>
    @foreach($data as $item)
    <tr>
        <th>{{$item->id}}</th>
        <td>{{$item->all_data}}</td>
    </tr>
    @endforeach
    </table>
    <hr>
</body>
