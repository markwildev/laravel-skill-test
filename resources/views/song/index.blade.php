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
                          <a  href="{{ route('song.create') }}"  class="btn btn-success ">Add Song</a>
                      </div>
                        <br>
                     
                    <div class="table-responsive">
                      @include('_components.notifications')
          <table class="table table-bordered mg-b-0">

            <thead>
            <tr>
               <th scope="col">Title</th>
              <th scope="col">Artist</th>
              <th scope="col">Date Created</th>

              <th scope="col">Action</th>      
            </tr>
            </thead>
            <tbody>
              @foreach ($songs as $song)
              <tr>
                <td>{{ strtoupper($song->title) }}</td>              
                <td>{{ strtoupper($song->artist) }}</td>              
                {{-- <td>{!! str_limit($song->lyrics,)  !!}</td>               --}}
                <td>{{ date('M d, Y'),strtotime($song->created_at)}}</td>              
                        
                <td> <a href="{{ route('song.show',[$song->id]) }}">View</a> | <a href="{{ route('song.edit',[$song->id]) }}">Edit</a> | <a href="{{ route('song.delete',[$song->id]) }}" id="delete" data-role="delete">Delete</a> </td>   
              </tr>
           
              @endforeach
            </tbody>
          </table>
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