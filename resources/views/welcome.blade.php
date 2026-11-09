<x-layout>

    <header>
        <div class="container-fluid header">
            @if(session()->has('successMessage'))
                <div class="alert alert-success">
                    {{ session('successMessage') }}
                </div>
            @endif
            @if(session()->has('errorMessage'))
                <div class="alert alert-danger">
                    {{ session('errorMessage') }}
                </div>
            @endif
            @if(session()->has('infoMessage'))
                <div class="alert alert-info">
                    {{ session('infoMessage') }}
                </div>
            @endif
            <div class="row h-100 justify-content-center align-items-center">
                <div class="col-12 d-flex justify-content-center align-items-center text-center">
                    <h1 class="text-light display-1 fw-bold text-color">Welcome to MovieMania</h1>
                </div>
            </div>
        </div>
    </header>

</x-layout>
