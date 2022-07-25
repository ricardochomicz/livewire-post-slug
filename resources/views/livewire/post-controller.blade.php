<div>
    <form wire:submit.prevent="store()">
        <div class="row">
            <div class="form-group col-sm-6">
                <label for="">Título</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" wire:model="title">
                @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-sm-6">
                <label for="">Slug</label>
                <input type="text" class="form-control @error('slug') is-invalid @enderror" wire:model="slug">
                @error('slug')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <button class="btn btn-primary mt-4">Cadastrar</button>
    </form>

    <table class="table table-borderless table-hover mt-5">
        <thead>
            <tr>
                <th>#</th>
                <th>Título Post</th>
                <th>Slug</th>
                <th>Criado em</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->slug }}</td>
                    <td>{{ \Carbon\Carbon::parse($post->created_at)->format('d/m/Y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
