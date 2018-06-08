@extends('layout.index')

@section('title', 'My Bookmarks')

@section('content')
    <div class="container">
        @include('portal.extra.header')
        @include('portal.extra.nav')
        <div class="row">
            <div class="col-lg-6 offset-lg-3 col-md-12 offset-md-0">
                @foreach (Auth::user()->bookmarkFolders as $folder)
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">{{ $folder->name }}</h5>
                        </div>
                        <div class="card-body p-0">
                            <table class="table mb-0">
                                @foreach ($folder->bookmarks as $bookmark)
                                    <tr>
                                        <td>
                                            {{ $bookmark->label }}
                                        </td>
                                        <td>
                                            {{ $bookmark->notes }}
                                        </td>
                                        <td>
                                            {{ !is_null($bookmark->location) ? $bookmark->location->name : "Unknown Location ". $bookmark->location_id }}
                                        </td>
                                        <td>
                                            {{ !is_null($bookmark->creator) ? $bookmark->creator->name : "Unknown Creator ". $bookmark->creator_id }}
                                        </td>
                                        <td>
                                            {{ !is_null($bookmark->type) ? $bookmark->type->name  : "Middle of Space" }}
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection