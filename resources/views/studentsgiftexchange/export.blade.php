
<table>
    <tr>
      <th>Names</th>
      <th>Names</th>

    </tr>
    @foreach($studentgiftexchange as $studentgiftexchanges)
    <tr>
      <td>{{$studentgiftexchanges->studentname}}</td>
      <td>{{$studentgiftexchanges->studentsname}}</td>

    </tr>
@endforeach
  </table>
