<<<<<<< HEAD
@extends('../layouts/app')

@section('content')

    <ul>
        <h1 style="text-align: center">이 곳은 현지 조원소개 페이지 입니다.</h1>
        @forelse($members as $member)
            <li>{{ $member }}</li>
        @empty
            <p>조원이 등록되지 않았습니다.</p>
        @endforelse
        <p style="text-align: center"><a href="{{ route('members.create') }}">멤버 자료 추가</a></p>
    </ul>
=======
@extends ('headers.header')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/styles/about.css') }}">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/styles/about_responsive.css') }}">


<!-- Discs -->

   <div class="discs">
		<div class="container">
			<div class="row discs_row">
				
            <!-- Disc -->
            @forelse($members as $member)
               <div class="col-xl-4 col-md-6 memberbox" id="memberbox_{{ $member->id }}">
                  <div class="disc">
                     <a href="single.html">
                        <div class="disc_image">   
                           <img id="memberImage_{{ $member->id }}" width="360" height="360" src="/img/{{ $member->img }}" alt=>
                        </div>
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
            @empty
            <p id="empty">조원이 등록되지 않았습니다.</p>
             @endforelse


			</div>
		</div>
<<<<<<< HEAD
   </div>
   
<!-- 구분 -->

   <div class="container">
      <div class="memberArea">
         @forelse($members as $member)
         <div class="memberbox" id="memberbox_{{ $member->id }}">
            <form class="showMember member-form" id="showMember_{{ $member->id }}" data-id="{{ $member->id }}" action="#" enctype="multipart/form-data">
               <div id="member_{{ $member->id }}">
                  <h3>{{ $member->name }}</h3>
                  <img id="memberImage_{{ $member->id }}" width="100" src="/img/{{ $member->img }}" alt="이미지가 등록되어있지 않습니다.">
               </div>
            </form>
            <div id="editAndDelete_{{ $member->id }}">

            </div>
         </div>
         @empty
            <p id="empty">조원이 등록되지 않았습니다.</p>
         @endforelse
      </div>

      <form id="createMember" action="#">
         <button type="submit" class="btn btn-warning" id="create">멤버추가</button>
      </form>
      <form id="addMember" action="#" enctype="multipart/form-data">
      </form>
      
      
      
      
   </div>
   <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
   <script type="text/javascript">
      $(document).ready(function() {

         var count = 0;

         $('#createMember').on("submit", function(event) {
            event.preventDefault();

            $.ajax({
               headers:{
                  'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
               },
               type: "GET",
               url: "{{ route('members.create') }}", 
               success: function(data) {
                  var html = $(`
                  <label for="name">이름</label>
                  <input type="text" name="name">
                  <br>
                  <label for="phone">전화번호</label>
                  <input type="text" name="phone_number">
                  <br>
                  <label for="address">주소</label>
                  <input type="text" name="address">
                  <br>
                  <label for="mottoes">좌우명</label>
                  <input type="text" name="mottoes">
                  <br>
                  <input type="file" name="img" id="img">
                  <br>
                  <input type="submit" value="생성">
                  `);

                  var addMember = $('#addMember');
                  count++;
                  if(count % 2 == 1) {
                     addMember.append(html);
                  } else {
                     addMember.html("");
                  }

               }
            });
         });

         $('#addMember').on("submit", function(event) {
            event.preventDefault();

            var form = $('#addMember')[0];
            var data = new FormData(form);

            $.ajax({
               headers:{
                  'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
               },
               type: "POST",
               url: "{{ route('members.store') }}", 
               contentType: false,
               processData: false,
               cache: false,
               data: data,
               success: function(data) {
                  // name, address, mottoes, phone_number
                  console.log('data img', data['img'])
                  var html = $(`
                  <div class='memberbox' id="memberbox_${data['id']}">
                     <form class="showMember" id="showMember_${data['id']}" data-id="${data['id']}" action="#">
                        <div id="member_${data['id']}">
                           <h3>${data['name']}</h3>
                           <img id="memberImage_${data['img']}" width="100" src="/img/${data['img']}" alt="이미지가 등록되어있지 않습니다.">
                        </div>
                     </form>
                     <div id="editAndDelete_${data['id']}">

                     </div>
                  </div>
                  `);

                  var memberArea = $('.memberArea');
                  var addMember = $('#addMember');
                  var empty = $('#empty');

                  memberArea.append(html);
                  addMember.html("");
                  empty.remove();
               
                  var showMemberId = $(`#showMember_${data['id']}`);
                  var editAndDeleteId = $(`#editAndDelete_${data['id']}`);

                  editAndDeleteId.on("click", onDeleteMember);
                  showMemberId.on("click", onShowMember);
                  
               }
            });
         });
         
         var edit_data = {};
         var showMember = $('.showMember');
         $(showMember.each(function() {
            var showMemberId = $(`#showMember_${$(this).attr('data-id')}`);

            showMemberId.on("click", onShowMember);
         }));

         function onShowMember() {
            var member_id = $(this).attr('data-id');

            $.ajax({
               headers:{
                  'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
               },
               type: "GET",
               url: "/members/" + member_id, 
               success: function(data) {
                  edit_data = data;
                  var htmlAfter = $(`
                  <h3 name="id">아이디 : ${data[0]['id']}</h3>
                  <h3 name="phone_number">전화번호 : ${data[0]['phone_number']}</h3>
                  <h3 name="address">주소 : ${data[0]['address']}</h3>
                  <h3 name="mottoes">좌우명 : ${data[0]['mottoes']}</h3>
                  `);

                  var editAndDelete = $(`
                  <form class="editMember" id="editMember_${data[0]['id']}" data-id="${data[0]['id']}" action="#">
                     <button type="button" name="edit">수정</button>
                  </form>
                  <form class="deleteMember" id="deleteMember_${data[0]['id']}" data-id="${data[0]['id']}" action="#">
                     <button type="button" name="delete">삭제</button>
                  </form>
                  `);

                  var htmlBefore= $(`
                  <h3>${data[0]['name']}</h3>
                  <img id="memberImage_${data[0]['img']}}" width="100" src="/img/${data[0]['img']}" alt="이미지가 등록되어있지 않습니다.">
                  `);

                  var memberDiv = $(`#member_${data[0]['id']}`);
                  var editAndDeleteDiv = $(`#editAndDelete_${data[0]['id']}`);
                  var dataArray = data[0];

                  count++;

                  if(count % 2 == 1) {
                     memberDiv.append(htmlAfter);
                     editAndDeleteDiv.append(editAndDelete);

                     var deleteMember = $(`#deleteMember_${data[0]['id']}`);
                     var editMember = $(`#editMember_${data[0]['id']}`);

                     editMember.on("click", onEditMemberCreateInput);
                     deleteMember.on("click", onDeleteMember);

                  } else {
                     memberDiv.html(htmlBefore);
                     editAndDeleteDiv.html("");
                  }
               }
            });

         }

         function onDeleteMember() {
            var member_id = $(this).attr('data-id');

            $.ajax({
               headers:{
                  'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
               },
               type: "DELETE",
               url: "/members/" + member_id,
               success: function(data) {
                  var memberBoxId = $(`#memberbox_${data}`);

                  memberBoxId.remove();
               },
               error: function(request, status, error){
                  console.log("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
               }
            });

         }

         function onEditMemberCreateInput() {

            var member_id = $(this).attr('data-id');
            var editMember = $(`#memberbox_${member_id}`);

            var html = $(`
            <form class="member-form-edit" id="editMember_${member_id}" data-id="${member_id}" action="#" enctype="multipart/form-data">
            <label for="name">이름</label>
            <input type="text" name="name" value="${edit_data[0].name}">
            <br>
            <label for="phone">전화번호</label>
            <input type="text" name="phone_number" value="${edit_data[0].phone_number}">
            <br>
            <label for="address">주소</label>
            <input type="text" name="address" value="${edit_data[0].address}">
            <br>
            <label for="mottoes">좌우명</label>
            <input type="text" name="mottoes" value="${edit_data[0].mottoes}">
            <br>
            <input type="file" name="img" accept="image/x-png,image/gif,image/jpeg">
            <br>
            <button id="editSubmit" type="submit">수정완료</button>
            </form>
            `);

            editMember.html("");
            editMember.append(html);

            var goEditMember = $('.member-form-edit');
            goEditMember.bind("submit",function(e){ 
               e.preventDefault();
               onEditMember(member_id);
            });

         }

         function onEditMember(member_id) {
            var editMember_num_form = $(`#editMember_${member_id}`)[0];
            var data = new FormData(editMember_num_form);
            data.append('_method','PATCH');

            $.ajax({
               headers:{
                  'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
               },
               type: "POST",
               url: "/members/" + member_id,
               contentType: false,
               processData: false,
               data: data,
               success: function(data) {
                  console.log('data', data);
                  var memberBox = $(`#memberbox_${member_id}`);
                  var html = $(`
                     <form class="showMember" id="showMember_${member_id}" data-id="${member_id}" action="#" enctype="multipart/form-data">
                        <div id="member_${member_id}">
                           <h3>${data['name']}</h3>
                           <img id="memberImage_${member_id}" width="100" src="/img/${data['img']}" alt="이미지가 등록되어있지 않습니다.">
                        </div>
                     </form>
                     <div id="editAndDelete_${member_id}">

                     </div>
                  `);

                  memberBox.html("");
                  memberBox.append(html);

                  var memberImage = $(`#memberImage_${member_id}`);
                  memberImage.attr("src", `/img/${data['img']}`)

                  var showMember_id = $(`#showMember_${member_id}`);
                  showMember_id.bind("click", onShowMember);

               },
               error: function(request, status, error){
                  console.log("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
               }
            });
         }

      });
   </script>


   
=======
	</div>
</div>

	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			/* $('#ajaxtest').submit(function() {
				var a = 0;

				$.ajax({
					headers:{
						'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
					},
					type: "POST",
					url: "",
					data: {
						"_token": "{{ csrf_token() }}",
					},
					success: function(data) {
						console.log(data);
						// $('#postRequestData').html(data);
					}
				});
			}); */

			/* $('#createMemeber').click(function() {
				console.log('click');
				var createHTML = document.createElement("div");

				createHTML.id = "create";
				createHTML.className = "col-xl-4 col-md-6";
				createHTML.innerHTML = "테스트";
				
				$.ajax({
					headers:{
						'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
					},
					type: "GET",
					url: "ajaxtest",
					data: {
						"_token": "{{ csrf_token() }}",
						create: craeteHTML,
					},
					success: function(data) {
						console.log(data);
						// $('#postRequestData').html(data);
					}
				});
			}); */

			$('#testbutton').click(function() {
				console.log('click');

				var testval = "테스트 데이터";

				$.ajax({
					headers:{
						'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
					},
					type: "POST",
					url: "ajaxtest",
					data: {
						"_token": "{{ csrf_token() }}",
						test: testval,
					},
					success: function(data) {
						console.log("data: ", data);
						// $('#postRequestData').html(data);
					}
				});
			});

			// 불렀는지 유무
			// 전역변수
			var called = false;
			var count = 0;
			var createDiv = document.getElementById('createDiv');

			// 멤버 추가 버튼 생성 함수
			function createHTML() {
				
				var nameInputSpace = document.createElement('input');
				nameInputSpace.type = "text";
				nameInputSpace.name = "name";
				nameInputSpace.id = "name";
				nameInputSpace.value = "{!! old('name') !!}";

				var submitButton = document.createElement('button');
				submitButton.type = "submit";
				submitButton.name = "addMember";
				submitButton.id = "addMember";
				submitButton.innerHTML = "조원추가";

				var html = $(`<input type="text" name="phone_number" id="phone_number" value="{!! old('phone_number') !!}"><input type="text" name="address" id="address" value="{!! old('address') !!}"><input type="text" name="mottoes" id="mottoes" value="{!! old('mottoes') !!}">`);

				console.log("nameInputSpace:", nameInputSpace);

				createDiv.append(nameInputSpace);
				createDiv.append(html);
				createDiv.append(submitButton);

				console.log(count);

				called=false;
			}

			$('#create').click(function() {
				console.log('createMember');
				called = true;
				var check = false;

				if(called) {
					check = true;
				}

				$.ajax({
					headers:{
						'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
					},
					type: "POST",
					url: "createMember",
					contentType: false,
					processData: false,
					data: {
						"_token": "{{ csrf_token() }}",
						checking: check,
					},
					success: function(data) {
						console.log("data: ", data);
						count++;
						console.log(count);
						if(data && count % 2 == 1) {
							createHTML();
						} else {
							createDiv.innerHTML = "";
						}
						// $('#postRequestData').html(data);
					}
				});
			});

			$('#addMember').click(function() {
				var name = $('#name').val();

				console.log("name:",name);
				
				formData = new FormData()
				$.ajax({
					headers:{
						'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
					},
					type: "POST",
					url: "addMember",
					contentType: false,
					processData: false,
					data: {
						"_token": "{{ csrf_token() }}",
						name: name,
					},
					success: function(data) {
						
					}
				});
			});

		});
	</script>
>>>>>>> 74462ce51bade993820781d875c9188a3185fc4f
>>>>>>> a077441a027777cee9ef9718f53ffba0fb7eae1d
@stop