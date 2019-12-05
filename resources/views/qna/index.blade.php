@extends ('headers.header')

@section('content')
<<<<<<< HEAD
<!-- Contact -->
	
<div class="contact">
		<div class="container">
			<div class="row">
				
				<!-- Contact Form -->
				<div class="col-lg-6">
					<div class="contact_form_container">
						<div class="contact_title">Send us a message</div>
						<form action="#" class="contact_form" id="contact_form">
							<input type="text" class="contact_input" placeholder="Name" required="required">
							<input type="email" class="contact_input" placeholder="E-mail" required="required">
							<input type="text" class="contact_input" placeholder="Subject">
							<textarea class="contact_input contact_textarea" placeholder="Message" required="required"></textarea>
							<button class="contact_button">Send Message</button>
						</form>
					</div>
				</div>

    <div class='container'>
        <h1>포럼 글 목록</h1>
        <hr/>
        <ul>
            @forelse($questions as $question)
                <li>
                    {{ $question->title }}
                    <small>
                        by {{ $question->user->name }}
                    </small>
                </li>
            @empty
                <p>글이 없습니다</p>
            @endforelse
        </ul>
    </div>
    @if($questions->count())
        <div class='text-center'>
            {!! $questions->render() !!}
        </div>
    @endif
    <p style="text-align: center"><a href="{{ route('qna.create') }}">질문하기</a></p>

@stop
				<!-- Contact Info -->
				<div class="col-lg-6 contact_col">
					<div class="contact_info">
						<div class="contact_title">Where to find us</div>
						<div class="contact_text">
							<p>In vitae nisi aliquam, scelerisque leo a, volutpat sem. Vivamus rutrum dui fermentum eros hendrerit, id lobortis leo volutpat. Maecenas sollicitudin est in libero pretium interdum. Nullam volutpat dui sem, ac congue purus luctus nec. Curabitur luctus luctus erat, sit amet facilisis quam congue quis. Quisque ornare luctus erat id dignissim. Nullam ac nunc quis ex porttitor luctus.</p>
						</div>
						<div class="contact_info_list">
							<ul>
								<li class="d-flex flex-row align-items-start justify-content-start">
									<div><div>Address</div></div>
									<div>1481 Creekside Lane Avila Beach, CA 931</div>
								</li>
								<li class="d-flex flex-row align-items-start justify-content-start">
									<div><div>Phone</div></div>
									<div>+53 345 7953 32453</div>
								</li>
								<li class="d-flex flex-row align-items-start justify-content-start">
									<div><div>E-mail</div></div>
									<div>yourmail@gmail.com</div>
								</li>
							</ul>
						</div>
						<div class="social">
							<ul class="d-flex flex-row align-items-center justify-content-start">
								<li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
=======
<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/QnA.css') }}">

<div>
	@auth
		<input class="useradmininput" type="hidden" value="{{ Auth::user()->admin }}">
	@else
		<input class="useradmininput" type="hidden" value="0">
	@endauth
</div>



<div id="qna_div">
	<table class="table-container">
		<thead>
			<tr>
				<th><h1>번호</h1></th>
				<th><h1>제목</h1></th>
				<th><h1>작성자</h1></th>
				<th><h1>작성일</h1></th>
			</tr>
		</thead>
		@foreach ($questions as $question)
			<tbody id="{{ $question->id }}">
				<tr class="title">
						<td>
							<p>{{ $question->id }}</p>
						</td>
						<td>
							<p>{{ $question->title }}</p>
						</td>
						<td>
							<p>{{ $question->user->name }}</p>
						</td>
						<td>
							<p>{{ $question->created_at }}</p>
						</td>
				</tr>

				<tr name="content">
					<td colspan="4">
						<p>{{ $question->content }}</p>
						@auth
							@if ( Auth::user()->admin == 1 )
								<button class="btn-delete">
									삭제
								</button>
							@endif
						@endauth
					</td>
				</tr>
			</tbody>
		@endforeach
	</table>
</div>

<div class="Align_Center">
		<!-- <button type="button" id="btn" data-toggle="modal" data-target="#layerpop`">Create Question</button> -->
		<!-- <button class="btn btn-warning btn-detail open_modal">Create Question</button> -->
    <button id="questionModalBtn" type="button" class="btn btn-primary" data-toggle="modal" data-target="#questionModal" >Create Question</button>

</div>


<!-- 질문글 작성 모달창 -->
<div class="modal fade" id="questionModal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTitle">Create Question</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
      </div>

      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="question-title" class="col-form-label">Title</label>
            <input type="text" class="form-control" id="question-title">
          </div>
          <div class="form-group">
            <label for="question-content" class="col-form-label">Content</label>
            <textarea class="form-control" id="question-content"></textarea>
          </div>
        </form>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">질문 저장하기</button>
        <!-- <button type="button" class="btn btn-primary">질문 저장</button> -->
      </div>
    </div>
  </div>
</div>

@stop

@section('script')
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="{{ URL::asset('js\jquery-3.2.1.min.js') }}"></script>
<script src="{{ URL::asset('css\styles\bootstrap-4.1.2\bootstrap.min.js') }}"></script>
<link rel="stylesheet" type="text/css" href="{{ URL::asset('css\styles\bootstrap-4.1.2\bootstrap.min.css') }}">
<script>
$(document).ready(function(){
  $('#questionModalBtn').click(function(e){
    e.preventDefault();
    console.log('event emitted');
    // $('#questionModal').modal();
    $('#questionModal').modal('show');
  });
});
</script>
@stop
>>>>>>> 74462ce51bade993820781d875c9188a3185fc4f
