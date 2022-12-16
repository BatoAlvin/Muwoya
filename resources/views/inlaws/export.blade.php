
<table>
    <tr>
      <th>Names</th>
      <th>Names</th>

    </tr>
    @foreach($inlaw as $inlaws)
    <tr>
      <td>{{$inlaws->inlaw_name}}</td>
      <td>{{$inlaws->inlaw_names}}</td>

    </tr>
@endforeach
  </table>
