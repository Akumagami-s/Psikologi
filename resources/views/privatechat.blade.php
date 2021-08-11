
<!DOCTYPE html>
<html>
	<head>
         <meta name="csrf-token" content="{{ csrf_token() }}">
		<title>Chat</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.js"></script>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
     
        <!------ Include the above in your HEAD tag ---------->
        

    </head>
	<!--Coded With Love By Mutiullah Samim-->
	<body>

        <style>
			body,html{
		height: 100%;
		margin: 0;
		background: #f1f7fd;
		/* background: #7F7FD5; */
	   /* background: -webkit-linear-gradient(to right, #91EAE4, #86A8E7, #7F7FD5); */
		/* background: linear-gradient(to right, #91EAE4, #86A8E7, #7F7FD5); */
	}

	.chat{
		margin-top: auto;
		margin-bottom: auto;
	}
	.card{
		height: 90vh;
		border-radius: 15px !important;
		background: #fff;
		box-shadow:0px 2px 15px rgba(0, 0, 0, 0.1);
		/* background-color: rgba(0,0,0,0.4) !important; */
	}
	.contacts_body{
		padding:  0.75rem 0 !important;
		overflow-y: auto;
		white-space: nowrap;
	}
	.msg_card_body{
		overflow-y: auto;
	}
	.card-header{
		border-radius: 15px 15px 0 0 !important;
		border-bottom: 0 !important;
	}
 .card-footer{
	border-radius: 0 0 15px 15px !important;
		border-top: 0 !important;
}
	.container{
		align-content: center;
	}
	.search{
		border-radius: 15px 0 0 15px !important;
		background-color: #1977cc !important;
		border:0 !important;
		color:white !important;
	}
	.search:focus{
		 box-shadow:none !important;
	   outline:0px !important;
	}
	.type_msg{
		background-color: #1977cc !important;
		border:0 !important;
		color:white !important;
		height: 60px !important;
		overflow-y: auto;
	}
		.type_msg:focus{
		 box-shadow:none !important;
	   outline:0px !important;
	}
	.attach_btn{
border-radius: 15px 0 0 15px !important;
background-color: #1977cc !important;
		border:0 !important;
		color: white !important;
		cursor: pointer;
	}
	.send_btn{
border-radius: 0 15px 15px 0 !important;
background-color: #1977cc !important;
		border:0 !important;
		color: white !important;
		cursor: pointer;
	}
	.search_btn{
		border-radius: 0 15px 15px 0 !important;
		background-color: #1977cc !important;
		border:0 !important;
		color: white !important;
		cursor: pointer;
	}
	.contacts{
		list-style: none;
		padding: 0;
	}
	.contacts li{
		width: 100% !important;
		padding: 5px 10px;
		margin-bottom: 15px !important;
	}
.active{
		background-color: #1977cc;
}
	.user_img{
		height: 70px;
		width: 70px;
		border:1.5px solid #f5f6fa;
	
	}
	.user_img_msg{
		height: 40px;
		width: 40px;
		border:1.5px solid #f5f6fa;
	
	}
.img_cont{
		position: relative;
		height: 70px;
		width: 70px;
}
.img_cont_msg{
		height: 40px;
		width: 40px;
}
.online_icon{
	position: absolute;
	height: 15px;
	width:15px;
	background-color: #4cd137;
	border-radius: 50%;
	bottom: 0.2em;
	right: 0.4em;
	border:1.5px solid white;
}
.offline{
	background-color: #c23616 !important;
}
.user_info{
	margin-top: auto;
	margin-bottom: auto;
	margin-left: 15px;
}
.user_info span{
	font-size: 20px;
	color: rgb(253, 229, 229)53, 229, 229);
}
.user_info p{
font-size: 10px;
color: black;
}
.video_cam{
	margin-left: 50px;
	margin-top: 5px;
}
.video_cam span{
	color: white;
	font-size: 20px;
	cursor: pointer;
	margin-right: 20px;
}
.msg_cotainer{
	margin-top: auto;
	margin-bottom: auto;
	margin-left: 10px;
	border-radius: 25px;
	background-color: #82ccdd;
	padding: 10px;
	min-width: 70px;
	position: relative;
}


::placeholder { 
								color: white;
								opacity: 1; 
							  }
							  
							  :-ms-input-placeholder {
								color: white;
							  }
							  
							  ::-ms-input-placeholder {
								color: white;
							  }

.msg_cotainer_send{
	margin-top: auto;
	margin-bottom: auto;
	margin-right: 10px;
	border-radius: 25px;
	min-width: 70px;
	background-color: #78e08f;
	padding: 10px;
	position: relative;
}
.msg_time{
	position: absolute;
	left: 0;
	bottom: -15px;
	color: rgb(26, 24, 24);
	font-size: 10px;
}
.msg_time_send{
	position: absolute;
	right:0;
	bottom: -15px;
	color: rgb(26, 24, 24);
	font-size: 10px;
}
.msg_head{
	position: relative;
}
#action_menu_btn{
	position: absolute;
	right: 10px;
	top: 10px;
	color: black;
	cursor: pointer;
	font-size: 20px;
}
.action_menu{
	z-index: 1;
	position: absolute;
	padding: 15px 0;
	background-color: rgba(0,0,0,0.5);
	color: black;
	border-radius: 15px;
	top: 30px;
	right: 15px;
	display: none;
}
.action_menu ul{
	list-style: none;
	padding: 0;
margin: 0;
}
.action_menu ul li{
	width: 100%;
	padding: 10px 15px;
	margin-bottom: 5px;
}
.action_menu ul li i{
	padding-right: 10px;

}
.action_menu ul li:hover{
	cursor: pointer;
	background-color: rgba(0,0,0,0.2);
}
@media(max-width: 576px){
.contacts_card{
	margin-bottom: 15px !important;
}
}

.search::placeholder {
        color: white;
        opacity: 1;
      }

	  .type_msg::placeholder{
		  color: white;
	  }

	</style>
		<div class="container-fluid h-100">
			<div class="row justify-content-center h-100">
				<div class="col-md-4 col-xl-3 chat"><div class="card mb-sm-3 mb-md-0 contacts_card">
					<div class="card-header">
						<div class="input-group">
							<input type="text" placeholder="Search..." name="" style="" class="form-control search">
							<div class="input-group-prepend">
								<span class="input-group-text search_btn"><i class="fas fa-search"></i></span>
							</div>
						</div>
					</div>
					<div class="card-body contacts_body">
						<ul class="contacts">
						
                            @foreach (App\Models\User::all() as $item)
                            @if ($item->id != Auth::id())
                            <li class="active">
                             <div class="d-flex bd-highlight">
                                 
                                 <div class="user_info">
                                     <span><a style="color: white;text-decoration: none" href="{{ route('privatechat', ['user_id'=>$item->id]) }}">{{$item->name}}</a></span>
                                     <p style="color: white;text-decoration: none">{{$item->name}} is online</p>
                                 </div>
                             </div>
                         </li>
                            @endif
                             
                             @endforeach
						</ul>
					</div>
					<div class="card-footer"></div>
				</div></div>
				<div class="col-md-8 col-xl-6 chat">
					<div class="card">
						<div class="card-header msg_head">
							<div class="d-flex bd-highlight">
								
								<div class="user_info">
									<span >{{$receive->name}}</span>
									
								</div>
								<div class="video_cam">
									<span><i class="fas fa-video"></i></span>
									<span><i class="fas fa-phone"></i></span>
								</div>
							</div>
							<span id="action_menu_btn"><i class="fas fa-ellipsis-v"></i></span>
							<div class="action_menu">
								<ul>
									<li><i class="fas fa-user-circle"></i> View profile</li>
									<li><i class="fas fa-users"></i> Add to close friends</li>
									<li><i class="fas fa-plus"></i> Add to group</li>
									<li><i class="fas fa-ban"></i> Block</li>
								</ul>
							</div>
						</div>
						<div id="chat" class="card-body msg_card_body">
							


                            @foreach ($chat as $item)
                                @if ($item->from == Auth::id())
                                <div class="d-flex justify-content-start mb-4">
                                   
                                    <div class="msg_cotainer">
                                       {{$item->message}}
                                        <span class="msg_time">8:40 AM, Today</span>
                                    </div>
                                </div>
                                @else
                                    

                                <div class="d-flex justify-content-end mb-4">
                                    <div class="msg_cotainer_send">
                                        {{$item->message}}
                                        <span class="msg_time_send">8:55 AM, Today</span>
                                    </div>
                                  
                                </div>

                                @endif
                            @endforeach















						
							
				
						</div>
						<div class="card-footer">
							<div class="input-group">
                                {{-- <form action=""> --}}
								<div class="input-group-append">
									<span class="input-group-text attach_btn"><i class="fas fa-paperclip"></i></span>
								</div>

								<textarea name="msg" id="msg" class="form-control type_msg" placeholder="Type your message..."></textarea>
								<div class="input-group-append">
									<button id="send" class="input-group-text send_btn"><i class="fas fa-location-arrow"></i></button>
								</div>
                            {{-- </form> --}}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script>
            	$(document).ready(function(){
$('#action_menu_btn').click(function(){
	$('.action_menu').toggle();
});
	});
        </script>



<script>

var id = @json($id);


                                
$("#send").click(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();
       
        $.ajax({
            type: "POST",
            url: "{{ route('send') }}",
            data: {
                message : $('#msg').val(),
                user_id : parseInt(id)
            },
            dataType: 'json',
            success: function (data) {
        $('#chat').append('<div class="d-flex justify-content-start mb-4"><div class="msg_cotainer">'+$('#msg').val()+'<span class="msg_time">8:40 AM, Today</span></div></div>');
                $('#msg').val('');

                console.log('success');
            },
            error: function (data) {
                console.log(data);
            }
        });
    });
</script>


    <script>

        setInterval(() => {
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
      $.ajax({
            type: "POST",
            url: "{{ route('getMsg') }}",
            data : {
                user_id : parseInt(id),
            },
            dataType: 'json',
            success: function (data) {
                
                for (let i = 0; i < data.length; i++) {
                    console.log('ada');
                    $('#chat').append('<div class="d-flex justify-content-end mb-4"><div class="msg_cotainer_send">'+data[i].message+'<span class="msg_time_send">8:55 AM, Today</span></div></div>');
                    }

            },
            error: function (data) {
                console.log(data);
            }
        });
        }, 1000);
    </script>


	</body>
</html>
