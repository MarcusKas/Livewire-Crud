<div>
    {{-- Be like water. --}}
    <div class="container">
        <div class="card">
            <div class="card-header text-center">POST LIST</div>
            <div class="row">
                <div class="col-3">

                    <div class="card-body">

                        @isset($post_id)
                            <form wire:submit.prevent="Updatepost({{ $post_id }})">
                                <div class="mb-3">
                                    <label id="id_label" for="id"></label>
                                    <input id="post_id" name="post_id" wire:model="post_id" type="hidden"
                                        class="form-control" />
                                </div>
                                <div class="mb-3">

                                    <input id="title" name="title" type="text" wire:model="title"
                                        class="form-control @error('title')border-danger
                            
                        @enderror" />
                                    @error('title')
                                        <p class="text-danger text-bold ">{{ $message }}</p>
                                    @enderror
                                </div>

                                <textarea class="form-control mb-3 @error('body')border-danger
                        
                    @enderror"
                                    name="body" id="" cols="30" rows="5" wire:model="body">
                    </textarea> @error('body')
                                    <p class="text-danger text-bold ">{{ $message }}</p>
                                @enderror
                                <button class="btn btn-success btn-sm" type="submit">Update Post</button>
                            </form>
                        @endisset

                        @empty($post_id)
                            <div class="card-header"> Create New Post</div>

                            <form wire:submit.prevent="createpost">
                                <div class="mb-3">

                                    <input id="title" name="title" type="text" placeholder="Enter Post Title"
                                        wire:model="title"
                                        class="form-control @error('title')border-danger
                                    
                                @enderror" />
                                    @error('title')
                                        <p class="text-danger text-bold ">{{ $message }}</p>
                                    @enderror
                                </div>

                                <textarea
                                    class="form-control mb-3 @error('body')border-danger
                                
                            @enderror"
                                    name="body" id="" cols="30" rows="5" wire:model="body" placeholder="Description">
                            </textarea> @error('body')
                                    <p class="text-danger text-bold ">{{ $message }}</p>
                                @enderror
                                <button class="btn btn-success btn-sm" type="submit">Save Post</button>
                            </form>
                        @endempty



                    </div>
                </div>
                <div class="col">
                    <div class="card-body">

                        <table class="table table-striped table-responsive table-hover ">

                            <tr>
                                <th>#id</th>
                                <th>Post Title</th>
                                <th>Post Body</th>
                                <th>Actions</th>
                            </tr>

                            @forelse ($posts as $post)
                                <tbody>
                                    <td>{{ $post->id }}</td>
                                    <td class="text-wrap">{{ $post->title }}</td>
                                    <td class="text-wrap">{{ $post->body }}</td>
                                    <td><i class="bi bi-pen-fill text-success " data-bs-toggle="modal"
                                            data-bs-target="#exampleModal"
                                            wire:click="editpost({{ $post->id }})"></button>
                                            <span> </span> <i class=" bi-trash3-fill text-danger"
                                                wire:click="remove({{ $post->id }})"></i>
                                    </td>
                                </tbody>
                            @empty
                                <div class="text-danger text-bold">No posts to show</div>
                            @endforelse
                        </table>

                    </div>
                </div>
            </div>

            {{-- update post modal --}}
            {{-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            ....body
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div> --}}

        </div>
    </div>
</div>
