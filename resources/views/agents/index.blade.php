<x-app-layout>

    @section('title')
        | Agents
    @endsection

    <section class="backgroundColor">
        <div class="container agents">
            <h3>Agents</h3>
            <form method="GET" action="{{ route('agents.index') }}">
                <div class="position-relative search-form text-right">
                    <input class="search" name="name" placeholder="Search ..." value="{{ request()->name }}" />
                    <a href="{{ route('agents.invite') }}" style="width: 100%" class="add-agents">+ ADD
                        AGENTS</a>
                </div>
            </form>
        </div>
    </section>

    <section class="backgroundColor">
        <div class="container">
            <div class="wrapper-table">
                <table>
                    <tbody>
                        @forelse ($agents as $key => $agent)
                            <tr class="{{ $key % 2 !== 0 ? 'background-orange' : '' }}">
                                <td class="profile-img">
                                    <img src="{{ asset('img') }}/default-avatar.png" />
                                </td>
                                <td class="slice">{{ $agent->email }}</td>
                                <td class="name-column">Jane Smith</td>
                                <td class="slice">Example Company</td>
                                <td class="active-column">
                                    {{ $agent->status == 1 ? 'Approved' : 'Pending' }}
                                </td>
                                <td>
                                    @if (!$agent->status)
                                        <a href="{{ route('agents.register', base64_encode($agent->email)) }}">Link</a>
                                    @else
                                        Remove Access
                                    @endif
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">No agents found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if ($agents)
                <div class="row justify-content-center float-end pt-3 pagina w-100">
                    {!! $agents->appends($_GET)->links('pagination::bootstrap-4') !!}
                </div>
            @endif
        </div>
    </section>

</x-app-layout>
