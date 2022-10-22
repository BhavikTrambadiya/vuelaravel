@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Users Requests</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">User</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Requested Date</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($userrequests as $req)
                                    <tr>
                                        <th scope="row">{{ $req->user->name }}</th>
                                        <td>{{ $req->points }}</td>
                                        <td>{{ $req->created_at->format('d M Y') }}</td>
                                        <td>
                                            <x-admin.user-request.status-td :req="$req">
                                            </x-admin.user-request.status-td>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td>No Record Found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $userrequests->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
