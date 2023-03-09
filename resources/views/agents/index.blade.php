<x-app-layout>

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
                        @forelse ($agents as $agent)
                            <tr>
                                <td class="profile-img">
                                    <img src="{{ asset('img') }}/100k-ai-faces-6.jpg" />
                                </td>
                                <td class="slice">{{ $agent->email }}</td>
                                <td class="name-column">Jane Smith</td>
                                <td class="slice">Example Company</td>
                                <td class="active-column">
                                    {{ $agent->status == 1 ? 'Approved' : 'Pending' }}
                                </td>
                                <td>Remove Access</td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">No agents found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>

</x-app-layout>
