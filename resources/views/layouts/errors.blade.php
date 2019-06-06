@if(count($errors))
    <div class="card">
        <div class="card-header alert-danger">{{ count($errors) }} та хато мавжуд</div>
        <div class="card-body alert-danger">
            <ul class="list-group">
                @foreach($errors->all() as $error)
                    <li class="list-group-item">{{ $error->message }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif