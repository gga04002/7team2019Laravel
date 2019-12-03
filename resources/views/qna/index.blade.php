@extends ('headers.header')

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
