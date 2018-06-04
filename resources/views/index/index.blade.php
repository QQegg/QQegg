@extends('layouts.master')

@section('title', 'HOME')

@section('content')
		<section id="featured" class="bg">


			<!-- start slider -->
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<marquee bgcolor="#CCCCFF"><font style="font-family:標楷體" size="+3">這裡是公告區喔!!</font></marquee>
						<div class="list-group flexslider">
							@if(count($posts) == 0)
								<p class="text-center">
									沒有任何公告
								</p>
							@endif
							@foreach($posts as $posts)
								<a href="{{route('postcontent',$posts->id)}}" class="list-group-item">
									{{$posts->title}}
                                    <?php
                                     $str_sec = explode(" ",$posts->created_at);
                                    ?>
                                    <div class="floatright">{{$str_sec['0']}}</div>
                                </a>
							@endforeach
						</div>
						<!-- Slider -->
						<div id="main-slider" class="main-slider flexslider">
							<ul class="slides">
								<li>
									<img src="img/slides/flexslider/6.jpg" alt="" />
									{{--<div class="flex-caption">--}}
										{{--<h3>Modern Design</h3>--}}
										{{--<p>Duis fermentum auctor ligula ac malesuada. Mauris et metus odio, in pulvinar urna</p>--}}
										{{--<a href="#" class="btn btn-theme">Learn More</a>--}}
									{{--</div>--}}
								</li>
								<li>
									<img src="img/slides/flexslider/4.jpg" alt="" />
									{{--<div class="flex-caption">--}}
										{{--<h3>Fully Responsive</h3>--}}
										{{--<p>Sodales neque vitae justo sollicitudin aliquet sit amet diam curabitur sed fermentum.</p>--}}
										{{--<a href="#" class="btn btn-theme">Learn More</a>--}}
									{{--</div>--}}
								</li>
								<li>
									<img src="img/slides/flexslider/5.jpg" alt="" />
									{{--<div class="flex-caption">--}}
										{{--<h3>Clean & Fast</h3>--}}
										{{--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit donec mer lacinia.</p>--}}
										{{--<a href="#" class="btn btn-theme">Learn More</a>--}}
									{{--</div>--}}
								</li>
							</ul>
						</div>
						<!-- end slider -->
					</div>
				</div>
			</div>


		</section>
		{{--<footer>--}}

@endsection



