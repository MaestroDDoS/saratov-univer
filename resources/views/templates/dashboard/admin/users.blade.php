<div class="user-table-line">
    <div class="col-sm">{{ $name }}</div>
    <div class="col-sm">{{ $surname }}</div>
    <div class="col-sm"><a href="mailto:{{ $email }}">{{ $email }}</a></div>
    <div class="col-sm">{{ $phone }}</div>
    <a class="dashboard-btn-edit" href="{{ route_url( "dashboard.admin.users.show", [ "id" => $id ] ) }}">
        <i class="fl-bigmug-line-gear30"></i>
    </a>
</div>
