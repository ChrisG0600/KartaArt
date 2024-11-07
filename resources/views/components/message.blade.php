@if (session('message'))
    <div id="success-alert" class="alert alert-success fixed bottom-4 right-4 z-50 bg-green-500 text-white p-4 rounded-lg shadow-lg">
        {{ session('message') }}
    </div>
@elseif (session('error'))
    <div id="info-alert" class="alert alert-success fixed bottom-4 right-4 z-50 bg-gray-500 text-white p-4 rounded-lg shadow-lg">
        {{ session('error') }}
    </div>
@elseif ($errors->any())
    <div id="error-alert" class="alert alert-error fixed bottom-4 right-4 z-50 bg-red-500 text-white p-4 rounded-lg shadow-lg">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
