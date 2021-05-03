@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Song</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="content content-components section-wrapper mb-5">

                        <form action="" method="POST">
              <section class="mt-4">     
                  <div class="row row-sm">
                      {{ csrf_field() }}
                    </div> 
                    <div class="col-md-12 ">
                      <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="" class="form-control"  value="{{ old('title') }}">
                         @if( $errors->first('title') )
                        <span class="text text-danger">{{ $errors->first('title') }}</span>
                        @endif 
                      </div>
                    </div> 
                    
                    <div class="col-md-12 ">
                      <div class="form-group">
                        <label for="address">Artist</label>
                        <input type="text" name="artist" id="" class="form-control" value="{{ old('artist') }}">
                       @if( $errors->first('artist') )
                        <span class="text text-danger">{{ $errors->first('artist') }}</span>
                        @endif
                      </div>
                    </div>

                    <div class="col-md-12 ">
                      <div class="form-group">
                        <label for="lyrics">Lyrics</label>
                         <textarea name="lyrics" cols="30" id="lyrics" rows="10" class="form-control editor">{!!old('lyrics')!!}</textarea>
                          @if($errors->first('lyrics'))
                          <span class="text text-danger">{{$errors->first('lyrics')}}</span>
                          @endif
                      </div>
                    </div>

                    
        
                    <div class="col-md-12 ">
                      <a href="{{ route('song.index') }}" class="btn btn-danger">Back</a>
                       <button class="btn btn-success" type="submit">Add</button>
                    </div>  
                  
                  </div><!-- row -->
               </section>
                 </form>  

                    </div><!-- content -->
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('page-scripts')
<script src="{{asset('assets/lib/ckeditor/ckeditor.js')}}" type="text/javascript"></script>
<script type="text/javascript">
  $(function(){
    CKEDITOR.replace( 'lyrics' );

  })
</script>
@stop