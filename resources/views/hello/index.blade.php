<div>{{$msg}}</div>
<form action="/hello" method="get">
    @csrf
    <div>NAME:<input type="text" name="name" value="{{old('name')}}"></div>
    <div>MAIL:<input type="text" name="mail" value="{{old('mail')}}"></div>
    <div>TEL: <input type="text" name="tel" value="{{old('tel')}}"></div>
    <input type="submit">
</form>
<ol>
    @for($i = 0;$i < count($keys);$i++)
        <li>{{$keys[$i]}}：{{$values[$i]}}</li>
    @endfor
    </ol>
