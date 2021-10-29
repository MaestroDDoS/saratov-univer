{{ __( 'search_result.show' ) }}
	<span>{{ ( $paginator->currentPage() - 1 ) * $paginator->perPage() + 1 }}</span>
	–
	<span>{{ ( $paginator->currentPage() - 1 ) * $paginator->perPage() + $paginator->count() }}</span>
{{ __( "search_result.list.$type" ) }} {{ __( 'search_result.from' ) }}
	<span>{{ $paginator->total() }}</span>
{{ __( 'search_result.founded' ) }}