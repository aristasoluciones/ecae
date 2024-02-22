<div class="card card-iepc-outline">
    <div class="card-body box-profile">
        <div class="text-center">
            <img class="profile-user-img img-fluid img-circle" src="{{ Auth::user()->adminlte_image() }}" alt="{{ Auth::user()->name }}" />
        </div>
        <div class="text-center py-2">
            <div
                x-data="{ isUploading: false, progress: 0 }"
                x-on:livewire-upload-start="isUploading = true"
                x-on:livewire-upload-finish="isUploading = false"
                x-on:livewire-upload-error="isUploading = false"
                x-on:livewire-upload-progress="progress = $event.detail.progress"
            >
                <button type="button" class="btn btn-sm bg-pink btn-file">
                    <span>Subir foto</span>
                    <input wire:model='foto' accept="image/*" type="file" name="foto">
                </button>
                <div x-show="isUploading">
                    <progress max="100" x-bind:value="progress"></progress>
                </div>
            </div>
            <small class="text-muted d-block">(Imagen con tamaño máximo de 700KB)</small>
            @error('foto')
            <span class="text-danger error h6">{{ $message }}</span>
            @enderror
        </div>
        <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>
        <p class="text-muted text-center">{{ strtoupper(Auth::user()->roles[0]->name) }}</p>
        @hasrole('odes')
        <ul class="list-group list-group-unbordered mb-3">
            <li class="list-group-item">
                <b>Consejo electoral:</b>
                <a href="javascript:;" class="float-right">{{ Auth::user()->sede  }}</a>
            </li>
        </ul>
        @endhasrole
    </div>
</div>
