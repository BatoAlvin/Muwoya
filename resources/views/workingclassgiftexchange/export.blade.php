
<table>
    <tr>
      <th>Names</th>
      <th>Names</th>

    </tr>
    @foreach($workingclassgiftexchange as $workingclassgiftexchanges)
    <tr>
      <td>{{$workingclassgiftexchanges->workingclassname}}</td>
      <td>{{$workingclassgiftexchanges->workingclassnames}}</td>

    </tr>
@endforeach
  </table>
