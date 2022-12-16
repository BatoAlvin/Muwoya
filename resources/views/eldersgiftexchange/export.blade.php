
<table>
    <tr>
      <th>Names</th>
      <th>Names</th>

    </tr>
    @foreach($eldergiftexchange as $eldergiftexchanges)
    <tr>
      <td>{{$eldergiftexchanges->name}}</td>
      <td>{{$eldergiftexchanges->eldergift}}</td>

    </tr>
@endforeach
  </table>
