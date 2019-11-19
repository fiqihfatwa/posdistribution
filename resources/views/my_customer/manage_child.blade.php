<ul>

    @foreach($childs as $child)

        <li>

            <span><a class="text-primary">{{ $child->name }}</a> join_at {{$user->created_at}}</span>

            @if(count($child->childs))

                @include('my_customer.manage_child',['childs' => $child->childs])

            @endif

        </li>

    @endforeach

</ul>