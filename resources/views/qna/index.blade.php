@extends ('headers.header')

<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/QnA.css') }}">

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
			<tbody>
				<tr class="title">
					<tr>
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
				</tr>

				<tr class="content" style="display:none">
					<td colspan=4>
						<p>$question->content</p>
						
							<button class="btn-delete" >
								삭제
							</button>
						
					</td>
				</tr>
			</tbody>
		@endforeach
	</table>
	
</div>