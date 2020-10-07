@extends('components.app')
@section('content')
    <div class="nurse-dashboard-style" style="min-height: 535px; padding-bottom: 0">
        <div class="container-fluid">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Illness Name</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Button</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Name</td>
                        <td>Created</td>
                        <td>
                            <a class="btn btn-primary">Button</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
