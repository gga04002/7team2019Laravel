@extends ('headers.header')

<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/QnA.css') }}">

<div>
	@auth
		<input class="useradmininput" type="hidden" value="{{ Auth::user()->admin }}">
	@else
		<input class="useradmininput" type="hidden" value="0">
	@endauth
</div>

<div class="Align_Center">
		<button id="btn">Create Question</button>
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
				
				<tr name="content" data-toggle="toggle">
					<td colspan="4">
						<p>{{ $question->content }}</p>
						@auth
							@if ( Auth::user()->admin == 1 )
								<button class="btn-delete" onClick="onDeleteQuestion({{ $question->id }});">
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

