@extends('admincp.adminlayout.app')
@section('content')
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="row">
        <div class="mt-50 mx-auto" style="width: 600px; height:350px" >
            <canvas id="acquisitions"></canvas>
        </div>
    </div>
</div>
</div>
<script type="text/javascript">
    var _data={!! json_encode($Total) !!}

</script>
@endsection