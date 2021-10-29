<div class="col-12">
	<article class="post post-modern box-xxl">
		<div class="post-modern-panel">
			<div><p class="post-modern-tag">{{ $category }}</p></div>
			<div>
				<time class="post-modern-time">{{ $datetime }}</time>
			</div>
		</div>
		<h3 class="post-modern-title">
			<a href="{{ route_url( 'common.blog.article', $id ) }}">{{ $title }}</a>
		</h3>
		<a class="post-modern-figure" href="{{ route_url( 'common.blog.article', $id ) }}">
			<img src="{{ asset( "images/articles/{$id}/preview/blog.jpg" ) }}" alt="" width="800" height="394"/>
		</a>
		<p class="post-modern-text">{{ $text }}</p>
		<a class="post-modern-link" href="{{ route_url( 'common.blog.article', $id ) }}">{{ __('common.read_more') }}</a>
	</article>
</div>
