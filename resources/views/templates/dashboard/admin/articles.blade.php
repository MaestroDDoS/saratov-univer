<div class="user-table-line">
    <div class="col-sm table-line-id pl-md-0"># {{$id}}</div>
    <div class="col-sm">{{$title}}</div>
    <div class="col-sm">{{$category}}</div>
    <div class="col-sm">{{$datetime}}</div>
    <a href="{{ route_url( "dashboard.admin.articles.show", [ "id" => $id ] ) }}" class="dashboard-btn-edit">
        <i class="fl-bigmug-line-gear30"></i>
    </a>
</div>
