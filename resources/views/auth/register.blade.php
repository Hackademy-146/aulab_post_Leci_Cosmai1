<x-layout>
    <div class="container-fluid p-5 text-center" 
         style="background-image: url('/storage/images/immagine.jpeg'); 
                background-size: cover; 
                background-position: center;">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="display-4 display-md-2 display-lg-1" 
                    style="font-family: 'Courier New', monospace; color: #ffffff; 
                           text-shadow: 0 0 10px rgb(0, 174, 162), 0 0 20px #0ff; text-align: center;">
                    Registrati
                </h1>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <form action="{{ route('register') }}" method="POST" class="card p-5 shadow">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome utente</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Conferma password</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                    </div>
                    <div class="mb-3 d-flex justify-content-center flex-column align-items-center">
                        <button type="submit" class="btn btn-outline-secondary">Registrati</button>
                        <p class="mt-2">Sei già registrato? <a href="{{ route('login') }}" class="text-secondary">Clicca qui</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
