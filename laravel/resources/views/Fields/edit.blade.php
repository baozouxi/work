<form id="form_box" name="form_box" method="post" action="javascript:fastP('{{ route('fields.update', ['id'=>$id]) }}',1);">
    <table cellspacing="1" cellpadding="0">
        <thead>
            <tr>
                <th colspan="6">
                    <center>选择需要显示的列</center>
                </th>
            </tr>
        </thead>
        <tbody id="table_bg">
        @foreach($origin_fields as $field)
        @if(is_int($loop->index/2))
            <tr class="t1">
        @else
            <tr class="t2">
        @endif
            @foreach($field as $name => $nickname)
                <td>
                    <input name="fields[]" id="{{ $name }}" type="checkbox" {{ in_array($name, $fields)? 'checked' : '' }}  value="{{ $name }}" >
                    <label for="{{ $name }}">{{ $nickname['name'] }}</label>
                </td>
            @endforeach

            </tr>
        @endforeach
        </tbody>
    </table>
    <label class="inline"></label>
    <input type="hidden" name="_method" value="PUT">
    {{ csrf_field() }}
    
    <input type="hidden"  name="type" value="{{ $type }}">
    <div name="msg_box" id="msg_box" style="width:556px;" class="msg">请稍后..</div>
    <label class="inline"></label>
    <button type="submit" id="submit_box" class="submit"><span class="icon">&#379;</span>提交</button>
    <button type="button" onclick="closeshow();" class="button"><span class="icon">&#378;</span>关闭</button>
</form>
