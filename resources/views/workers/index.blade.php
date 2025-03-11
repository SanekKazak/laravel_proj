<div>
    <h1 >Список рабочих</h1>
    
        @foreach ($workers as $worker)
            <div>
                <div>
                    <h2>{{ $worker->name }}</h2>
                    <p>{{ $worker->email }}</p>
                </div>
            </div>
        @endforeach
</div>