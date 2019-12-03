@extends ('headers.header')

<div class="discs">
	<div class="container">
		<div class="row discs_row">
			
			<!-- Disc -->
			<div class="col-xl-4 col-md-6">
				<div class="disc">
					<a href="single.html">
						<div class="disc_image"><img src="images/disc_1.jpg" alt="https://unsplash.com/@tanelah"></div>
						<div class="disc_container">
							<div>
								<div class="disc_content_1">
									<div class="disc_title">Mixtape</div>
									<div class="disc_subtitle">Music For the People</div>
								</div>
							</div>
						</div>
					</a>
				</div>
			</div>

			<!-- Disc -->
			<div class="col-xl-4 col-md-6">
				<div class="disc">
					<a href="single.html">
						<div class="disc_image"><img src="images/disc_2.jpg" alt="https://unsplash.com/@kasperrasmussen"></div>
						<div class="disc_container">
							<div>
								<div class="disc_content_2 d-flex flex-column align-items-center justify-content-center">
									<div>
										<div class="disc_title">Mixtape</div>
										<div class="disc_subtitle">the world is ours</div>
									</div>
								</div>
							</div>
						</div>
					</a>
				</div>
			</div>

			<!-- Disc -->
			<div class="col-xl-4 col-md-6">
				<div class="disc">
					<a href="single.html">
						<div class="disc_image"><img src="images/disc_3.jpg" alt="https://unsplash.com/@photones11"></div>
						<div class="disc_container">
							<div>
								<div class="disc_content_3">
									<div>
										<div class="disc_title">Mixtape</div>
										<div class="disc_subtitle">Singles</div>
									</div>
								</div>
							</div>
						</div>
					</a>
				</div>
			</div>

			<!-- Disc -->
			<div class="col-xl-4 col-md-6">
				<div class="disc">
					<a href="single.html">
						<div class="disc_image"><img src="images/disc_4.jpg" alt="https://unsplash.com/@rexcuando"></div>
						<div class="disc_container">
							<div>
								<div class="disc_content_4 d-flex flex-column align-items-start justify-content-end">
									<div class="text-left">
										<div class="disc_title">Mixtape</div>
										<div class="disc_subtitle">1983</div>
									</div>
								</div>
							</div>
						</div>
					</a>
				</div>
			</div>

			<!-- Disc -->
			<div class="col-xl-4 col-md-6">
				<div class="disc">
					<a href="single.html">
						<div class="disc_image"><img src="images/disc_5.jpg" alt="https://unsplash.com/@alicemoore"></div>
						<div class="disc_container">
							<div>
								<div class="disc_content_5">
									<div class="disc_title">Mixtape</div>
								</div>
							</div>
						</div>
					</a>
				</div>
			</div>

			<!-- Disc -->
			<div class="col-xl-4 col-md-6">
				<div class="disc">
					<a href="single.html">
						<div class="disc_image"><img src="images/disc_6.jpg" alt="https://unsplash.com/@arstyy"></div>
						<div class="disc_container">
							<div>
								<div class="disc_content_6">
									<div class="disc_title">Mixtape</div>
									<div class="disc_subtitle">Music For the People</div>
								</div>
							</div>
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>

<div>
	<ul>
        <h1 style="text-align: center">이 곳은 현지 조원소개 페이지 입니다.</h1>
        @forelse($members as $member)
            <li>{{ $member }}</li>
        @empty
            <p>조원이 등록되지 않았습니다.</p>
        @endforelse
        <p style="text-align: center"><a href="{{ route('members.create') }}">멤버 자료 추가</a></p>
    </ul>
</div>