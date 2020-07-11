
@extends('template.master')

@section('title', 'Pertanyaan')


@section('content')
<div class="container">
	<form action="/pertanyaan" method="POST" id="form-pertanyaan">
    @csrf
    <div class="form-group">
        @foreach ($users as $user => $item)
            <input type="hidden" name="user_id" value="{{$item ->id}}">
        @endforeach
    </div>
    <div class="form-group">
        <label for="content">Judul</label>
      <input  type="text" class="form-control required" name="judul" placeholder="Masukan judul">
    </div>
    <div class="form-group">
      <label for="content">Pertanyaan</label>
      <textarea class="form-control required" id="content" name="isi"></textarea>
    </div>
    <div class="form-group">
      <label for="tags">Tags</label><br>
      <input  type="text" class="form-control" id="tags" name="tags">
    </div>
    <button type="button" class="btn btn-primary"  onclick="submit_data();">Submit</button>
  </form>
</div>

@endsection

@push('scripts')

<link rel="stylesheet" href="{{asset('/template/dist/css/bootstrap-tagsinput.css')}}">

<script src="{{asset('/template/dist/js/bootstrap-tagsinput.js')}}"></script>

<script>
function submit_data(){
    var cek = 0; 
    $("#form-pertanyaan").find('input.required, textarea.required').each(function(){
        $(this).parents('.form-group').removeAttr('style');
        if ($(this).val() == ''){
            cek++;
            $(this).parents('.form-group').attr('style','border:red 1px solid;');
        }
    });
   
    if (cek > 0){
        Swal.fire({
            title: 'Perhatian!',
            text: 'Ada Inputann yang belum diisi',
            icon: 'error',
            confirmButtonText: 'Cool'
        });
        return false;
    }else{
        $("#form-pertanyaan").submit();
    }

    
}
$(document).ready(function(){

  

    setTimeout(() => {
        $("#tags").tagsinput();
    }, 200);
   
});
</script>
@endpush