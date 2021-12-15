<body>
    Hello, {{ $name }}.		// display content of named variable from view(), also <?php echo $name; ?>
    The current UNIX timestamp is {{ time() }}
    @verbatim	//multiline no blade statements	
        <div class="container">
            Hello, {{ name }}.
        </div>
    @endverbatim
    {{-- This comment will not be present in the rendered HTML --}}		//comments

    {{-- <div>@include('shared.errors')</div>
    @include('view.name', ['status' => 'complete'])	//pass data to included view						 --}}

    {{-- @inject('metrics', 'App\Services\Myservice')
        <div>Monthly Revenue: {{ $metrics->getMetrics() }}.</div> --}}
    
    @once		//rendered once
    @endonce
    
    @php
    echo 'this is php<br/>';
    @endphp

    @if (count($records) === 1)
    @elseif (count($records) > 1)
    @else
    No records
    @endif

    @for ($i = 0; $i < 10; $i++)
        The current value is {{ $i }}
    @endfor

    {{-- @foreach ($users as $user)
        <p>This is user {{ $user->id }}</p>
    @endforeach --}}

    {{-- @switch($i)
        @case(1)
            First case... @break
        @case(2)
            Second case... @break
        @default
            Default case...
    @endswitch --}}

    {{-- @isset($records)	// $records is defined and is not null...
    @endisset --}}

    {{-- @empty($records)	// $records is "empty"...
    @endempty --}}

    <form action="/foo/bar" method="POST">
        @csrf
        @method('PUT|PATCH|DELETE')		//or use hidden with name _method value PUT|PATCH|DELETE
        <input id="title" type="text" class="@error('title') is-invalid @else is-valid @enderror">
        @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </form>

    root dir
    $path = base_path('vendor/bin');
    public dir
    $path = public_path('css/app.css');
    resources dir
    $path = resource_path('sass/app.scss');
    storage dir
    $path = storage_path('app/file.txt');


</body>