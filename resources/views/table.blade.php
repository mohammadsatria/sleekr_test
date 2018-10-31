<table class="table table-striped jambo_table bulk_action">
  <thead>
    <tr class="headings">
      <th width="4%">
      </th>
      <th class="column-title" width="5%">No </th>
      <th class="column-title" width="70%" >To Do </th>
      <th class="column-title no-link last"><span class="nobr">Action</span></th>
      <th class="bulk-actions" colspan="4">
        <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
      </th>
    </tr>
  </thead>

  <tbody>
  <?php
    $no = 1;
    $count = $data->count();
  ?>
  @if ($count > 0)
      @foreach ($data as $key => $val)
          <tr class="even pointer">
              <td class="a-center ">
                  <input type="checkbox" class="flat" onclick="saveData('{{$val->id}}', '1')" {{ $val->status == '1' ? 'checked' : '' }} name="table_records">
              </td>
              <td class=" ">{{ $no }}</td>
              <td id="realData_{{ $val->id }}"  style="{{ $val->status == '1' ? 'text-decoration: line-through' : '' }}">{{ $val->description }}</td>
              <td id="tdEdit_{{ $val->id }}" style="display:none;">
                  <input type="text" class="form-control" style="width: 50%" maxlength="100" value="{{ $val->description }}" id="editValue_{{ $val->id }}">
                  <input type="hidden" value="{{ $val->status }}" id="status_{{ $val->id }}">
              </td>
              <td id="last_{{ $val->id }}">
                  <i style="cursor: pointer" onclick="editData('{{ $val->id }}')" class="fa fa-pencil"></i>
                  <i style="cursor: pointer" onclick="deleteData('{{ $val->id }}')" class="fa fa-trash"></i>
              </td>
              <td id="tdEditButton_{{ $val->id }}" style="display:none;">
                  <i style="cursor: pointer"  onclick="saveData('{{ $val->id }}', '0')" class="fa fa-check-square-o"></i>
              </td>
          </tr>
          <?php $no++?>
      @endforeach
  @else
      <td colspan="4" align="center"><i>Data not found</i></td>
  @endif
  </tbody>
</table>
