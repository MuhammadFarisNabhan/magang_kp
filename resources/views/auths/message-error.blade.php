@foreach ($errors->all() as $error)                    
    {{-- <div class="alert alert-danger d-flex align-items-center" role="alert" style="z-index: 2">
        <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
        <div>
            {{ $error }}
        </div>            
    </div> --}}
    <div class="container" id="modal-message">
        <div class="container-card">
            <div class="card-message">
                <div class="message-header">
                    <img src="img/icons/icon_error.png" alt="">
                    <p>Error</p>
                </div>
                <div class="messages">
                    {{ $error }}
                </div>
                <button type="submit" onclick="document.getElementById('modal-message').style.display='none'">Coba Lagi...</button>
            </div>
        </div>
    </div>
@endforeach    