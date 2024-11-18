@props(['post'=>$post])

<div class="mb-2 border-b rounded-b-md">
    <a href="{{ route('user.posts', $post->user) }}" class="font-bold text-red-500">{{$post->user->name}}</a><span
        class="text-xs text-gray-300">
                            {{$post->created_at->diffForHumans()}}
                        </span>
    <p class="text-white">{{$post->body}}</p>

    <div class="flex items-center">
        @auth
            @if(!$post->likedBy(auth()->user()))
                <form action="{{ route('posts.likes',$post) }}" method="post" class="mr-1">
                    @csrf
                    <button type="submit" class="text-red-500">Like</button>
                </form>
            @else
                <form action="{{ route('posts.likes',$post) }}" method="post" class="mr-1">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500">Unlike</button>
                </form>
            @endif
        @endauth
        <span
            class="text-red-500 pb-2.5 text-xs">{{ $post->likes->count() }} {{ Str::plural('like',$post->likes->count()) }}</span>
        @can('delete',$post)
            <form action="{{ route('post.destroy',$post) }}" method="post" class="ml-4">
                @csrf
                @method('delete')
                <button type="submit" class="text-red-500">Delete</button>
            </form>
        @endcan
    </div>
</div>
