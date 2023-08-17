<form class="page-button-form">
    @if($countPages<=5&&$countPages!=1)
    @for($i=1;$i<=$countPages;$i++)
    <input type="submit" class="page-button" name="page" value="{{$i}}" style="width:{{100/$countPages}}%" >
    @endfor
    @elseif ($countPages>5)
    <input type="submit" class="prev" name="page" value="First">
    @for($i=$middleId-2;$i<=$middleId+2;$i++)
    <input type="submit" class="page-button" name="page" value="{{$i}}" style="width:12%" >
    @endfor
    <input type="submit" class="last" name="page" value="Last">
    @endif
</form>
