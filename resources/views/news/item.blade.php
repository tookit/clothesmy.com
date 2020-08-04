@extends('layouts.app')

@section('content')
<div class="tt-breadcrumb">
    <div class="container">
        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="/news">News</a></li>
            <li>{{$item->name}}</li>

        </ul>
    </div>
</div>
<div id="tt-pageContent">
	<div class="container-indent">
		<div class="container container-fluid-custom-mobile-padding">
			<div class="row justify-content-center">
				<div class="col-xs-12 col-md-10 col-lg-8 col-md-auto">
					<div class="tt-post-single">
						<div class="tt-tag"><a href="#">{{$item->category->name}}</a></div>
						<h1 class="tt-title">
							{{$item->name}}
						</h1>
						<div class="tt-autor">by <span>Coco</span> {{$item->created_at}}</div>
						<div class="tt-post-content">
                            {!! $item->content !!}
						</div>
						<div class="post-meta">
							<!-- <span class="item">
								<span>Tag:</span> <span><a href="#">FASHION</a></span>, <span><a href="#">STYLE</a></span>
							</span> -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container-indent wrapper-social-icon">
		<div class="container">
			<ul class="tt-social-icon justify-content-center">
				<li><a class="icon-g-64" href="http://www.facebook.com/"></a></li>
				<li><a class="icon-h-58" href="http://www.facebook.com/"></a></li>
				<li><a class="icon-g-66" href="http://www.twitter.com/"></a></li>
				<li><a class="icon-g-67" href="http://www.google.com/"></a></li>
				<li><a class="icon-g-70" href="https://instagram.com/"></a></li>
			</ul>
		</div>
	</div>

</div>

@endsection
