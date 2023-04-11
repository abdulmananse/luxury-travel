<x-app-layout>

    <section class="backgroundColor">
        <div class="container agents">
            <h3>Companies</h3>
            <form method="GET" action="{{ route('companies.index') }}">
                <div class="position-relative search-form text-right">
                    <input class="search" name="name" placeholder="Search ..." value="{{ request()->name }}" />
                    <a href="{{ route('companies.create') }}" style="width: 100%" class="add-agents">
                        + ADD COMPANY
                    </a>
                </div>
            </form>
        </div>
    </section>

    <section class="backgroundColor">
        <div class="container">
            <div class="wrapper-table">
                <table>
                    <tbody>
                        @forelse ($companies as $company)
                            <tr>
                                <td class="profile-img">
                                    <img src="{{ asset('img') }}/100k-ai-faces-6.jpg" />
                                </td>
                                <td class="slice">{{ $company->email }}</td>
                                <td class="name-column">{{ $company->name }}</td>
                                <td class="name-column">{{ $company->phone }}</td>
                                <td class="slice">{{ $company->website }}</td>
                                <td class="active-column">
                                    <a href="{{ url('companies/' . $company->id) }}">Edit</a>
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">No company found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>

</x-app-layout>
