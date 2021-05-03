


 @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">




                <div class="card-header">Songs</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="content content-components section-wrapper mb-5">
                      <div class="d-flex justify-content-end mb-2">
                          <a  href="{{ route('song.index') }}"  class="btn btn-danger ">Back</a>
                      </div>
                        <br>
                     
         <div class="table-responsive">
          {!! $song->lyrics !!}
        </div>


                    </div><!-- content -->
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('page-scripts')

<script type="text/javascript">
  $(document).ready(function(){
    $(document).on('click','a[data-role=delete]',function(){
      if(confirm("Are you sure want to delete this song?") == true){
        return true;
      }else{
        return false;
      }
    })

  })
</script>

<script type="text/javascript">
</script>
@stop