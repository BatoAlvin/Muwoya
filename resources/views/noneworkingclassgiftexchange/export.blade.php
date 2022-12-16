
<table>
    <tr>
      <th>Names</th>
      <th>Names</th>

    </tr>
    @foreach($noneworkingclassgiftexchange as $noneworkingclassgiftexchanges)
    <tr>
      <td>{{$noneworkingclassgiftexchanges->working_classname}}</td>
      <td>{{$noneworkingclassgiftexchanges->working_classnames}}</td>

    </tr>
@endforeach
  </table>
