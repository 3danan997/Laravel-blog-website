<x-mail::message>
# You have received a like

    {{ $liker->name }} just liked one of your posts

<x-mail::button :url="route('post.show', $post)">
ViewPost
</x-mail::button>


Thanks,<br>
Adnan
</x-mail::message>
